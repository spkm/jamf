<?php

namespace spkm\Jamf;

use BadMethodCallException;
use InvalidArgumentException;
use spkm\Jamf\Auth\Credentials;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Pro\ProConnector;

/**
 * What the Jamf facade resolves: the Jamf Pro API connector for the default server, built from config('jamf') the
 * first time it is needed, and for any named connections, each with its Classic API connector. Methods the
 * service doesn't have go to the default server's Jamf Pro API connector.
 *
 * @mixin ProConnector
 */
class JamfService
{
    /** @var array<string, ProConnector> */
    protected array $connectors = [];

    /**
     * The Jamf Pro API connector for another server, configured under jamf.connections.{name}.
     */
    public function connection(string $name): ProConnector
    {
        return $this->pro($name);
    }

    /**
     * The Jamf Pro API connector: the default server's, or a named connection's.
     */
    public function pro(?string $connection = null): ProConnector
    {
        if ($connection === null) {
            return $this->connectors[''] ??= new ProConnector($this->credentials((array) config('jamf'), 'The default Jamf connection'));
        }

        $config = config("jamf.connections.$connection");

        if (! is_array($config)) {
            throw new InvalidArgumentException('No Jamf connection named "'.$connection.'" is configured in jamf.connections.');
        }

        return $this->connectors[$connection] ??= new ProConnector($this->credentials($config, 'The Jamf connection "'.$connection.'"'));
    }

    /**
     * The Classic API connector: the default server's, or a named connection's.
     */
    public function classic(?string $connection = null): ClassicConnector
    {
        return $this->pro($connection)->classic();
    }

    /**
     * @param  array<mixed>  $parameters
     */
    public function __call(string $method, array $parameters): mixed
    {
        $connector = $this->pro();

        if (method_exists($connector, $method)) {
            return $connector->{$method}(...$parameters);
        }

        throw new BadMethodCallException("Method {$method} does not exist.");
    }

    /**
     * The credentials a connection's config gives: an API client when it has a client id, else an account.
     *
     * @param  array<mixed>  $config
     */
    private function credentials(#[\SensitiveParameter] array $config, string $connection): Credentials
    {
        $setting = fn (string $key): ?string => is_string($config[$key] ?? null) && $config[$key] !== '' ? $config[$key] : null;
        $baseUrl = $setting('base_url') ?? throw new InvalidArgumentException("$connection needs a base_url.");

        if ($setting('client_id') !== null || $setting('client_secret') !== null) {
            return Credentials::apiClient(
                $baseUrl,
                $setting('client_id') ?? throw new InvalidArgumentException("$connection needs a client_id."),
                $setting('client_secret') ?? throw new InvalidArgumentException("$connection needs a client_secret."),
            );
        }

        if ($setting('username') !== null || $setting('password') !== null) {
            return Credentials::account(
                $baseUrl,
                $setting('username') ?? throw new InvalidArgumentException("$connection needs a username."),
                $setting('password') ?? throw new InvalidArgumentException("$connection needs a password."),
            );
        }

        throw new InvalidArgumentException("$connection needs a client_id and client_secret, or a username and password.");
    }
}
