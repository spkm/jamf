<?php

namespace spkm\Jamf\Classic;

use Saloon\Enums\Method;
use Saloon\Http\Connector;
use Saloon\Http\Response;
use spkm\Jamf\Auth\Credentials;
use spkm\Jamf\Classic\Requests\ClassicAdhocBodyRequest;
use spkm\Jamf\Classic\Requests\ClassicAdhocRequest;
use spkm\Jamf\Classic\Resources\ClassicAdhocResource;
use spkm\Jamf\Classic\Resources\HasResources;
use spkm\Jamf\JamfConnector;
use spkm\Jamf\Pro\ProConnector;

/**
 * The connection to one server's Classic API (/JSSResource): a resource for every group of endpoints Jamf
 * documents, and ad-hoc calls for anything else. Records come back as arrays, read as JSON; records go as XML,
 * built from an array under the element that names their kind.
 */
class ClassicConnector extends JamfConnector
{
    use HasResources;

    public function __construct(Credentials $credentials, protected ?ProConnector $pro = null)
    {
        parent::__construct($credentials);
    }

    /**
     * The API's root: the server's address with /JSSResource appended.
     */
    public function resolveBaseUrl(): string
    {
        return $this->baseUrl().'/JSSResource';
    }

    /**
     * The same server's Jamf Pro API, signed in with the same credentials.
     */
    public function pro(): ProConnector
    {
        return $this->pro ??= new ProConnector($this->credentials);
    }

    protected function tokenConnector(): Connector
    {
        return $this->pro();
    }

    /**
     * A collection the package has no resource for, as Jamf::classic()->from('/newthings', 'new_thing'): listed at
     * /path, found, updated and deleted at /path/id/{id}, and created at /path/id/0, with records written under
     * the element $root.
     */
    public function from(string $path, string $root): ClassicAdhocResource
    {
        return new ClassicAdhocResource($this, $path, $root);
    }

    /**
     * @param  array<string, mixed>  $query
     */
    public function get(string $path, array $query = []): Response
    {
        return $this->send(new ClassicAdhocRequest(Method::GET, $path, $query));
    }

    /**
     * Send a record: an array under the one key that names its kind (['building' => ['name' => 'Library']]), or
     * the XML itself.
     *
     * @param  array<string, mixed>|string  $body
     * @param  array<string, mixed>  $query
     */
    public function post(string $path, array|string $body = [], array $query = []): Response
    {
        return $this->send(new ClassicAdhocBodyRequest(Method::POST, $path, $body, $query));
    }

    /**
     * @param  array<string, mixed>|string  $body
     * @param  array<string, mixed>  $query
     */
    public function put(string $path, array|string $body = [], array $query = []): Response
    {
        return $this->send(new ClassicAdhocBodyRequest(Method::PUT, $path, $body, $query));
    }

    /**
     * @param  array<string, mixed>  $query
     */
    public function delete(string $path, array $query = []): Response
    {
        return $this->send(new ClassicAdhocRequest(Method::DELETE, $path, $query));
    }
}
