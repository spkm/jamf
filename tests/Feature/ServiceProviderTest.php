<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\ServiceProvider;
use Saloon\Http\Faking\MockResponse;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Facades\Jamf;
use spkm\Jamf\JamfService;
use spkm\Jamf\JamfServiceProvider;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateOauthTokenV1Request;
use spkm\Jamf\Tests\Fixtures\ExampleItemRequest;
use spkm\Jamf\Tests\Helpers\FakeJamf;

/**
 * @param  array<string, mixed>  $settings
 */
function configureJamf(array $settings): void
{
    foreach (['base_url', 'client_id', 'client_secret', 'username', 'password'] as $key) {
        config()->set("jamf.$key", $settings[$key] ?? null);
    }
}

it('binds the service as a singleton behind the facade', function () {
    expect(app('jamf'))->toBeInstanceOf(JamfService::class)
        ->and(app('jamf'))->toBe(app('jamf'))
        ->and(Jamf::getFacadeRoot())->toBe(app('jamf'));
});

it('loads the config with its environment names', function () {
    expect(config('jamf'))->toHaveKeys(['base_url', 'client_id', 'client_secret', 'username', 'password', 'connections', 'timeouts', 'retries', 'reauthenticate', 'cache', 'pagination'])
        ->and(config('jamf.pagination.per_page'))->toBe(100)
        ->and(config('jamf.reauthenticate'))->toBeTrue()
        ->and(config('jamf.connections'))->toBe([])
        ->and(config('jamf.cache.enabled'))->toBeFalse()
        ->and(file_get_contents(__DIR__.'/../../config/jamf.php'))->toContain(
            "env('JAMF_BASE_URL')",
            "env('JAMF_CLIENT_ID')",
            "env('JAMF_CLIENT_SECRET')",
            "env('JAMF_USERNAME')",
            "env('JAMF_PASSWORD')",
            "env('JAMF_CONNECT_TIMEOUT', 10)",
            "env('JAMF_REQUEST_TIMEOUT', 30)",
            "env('JAMF_RETRIES')",
            "env('JAMF_CACHE', false)",
            "env('JAMF_CACHE_STORE')",
        );
});

it('registers the install command and the config to publish', function () {
    $paths = ServiceProvider::pathsToPublish(JamfServiceProvider::class, 'jamf-config');

    expect(Artisan::all())->toHaveKey('jamf:install')
        ->and($paths)->toHaveCount(1)
        ->and(realpath((string) array_key_first($paths)))->toBe(realpath(__DIR__.'/../../config/jamf.php'))
        ->and(array_values($paths)[0])->toBe(config_path('jamf.php'));
});

it('signs the default connection in with an API client when one is configured', function () {
    configureJamf(['base_url' => 'https://school.jamfcloud.test/', 'client_id' => 'client-id', 'client_secret' => 'client-secret', 'username' => 'ignored', 'password' => 'ignored']);
    $mockClient = FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make(['id' => '1'])]);

    Jamf::send(new ExampleItemRequest(1));

    expect(Jamf::pro()->credentials()->usesApiClient())->toBeTrue()
        ->and(Jamf::pro()->credentials()->identity())->toBe('client:client-id')
        ->and(FakeJamf::urisReceived($mockClient, ExampleItemRequest::class))->toBe([FakeJamf::API_URL.'/v1/examples/1'])
        ->and(FakeJamf::responsesTo($mockClient, CreateOauthTokenV1Request::class))->toHaveCount(1)
        ->and(FakeJamf::authorizationsReceived($mockClient, ExampleItemRequest::class))->toBe(['Bearer fake-oauth-token']);
});

it('signs the default connection in with an account when no API client is configured', function () {
    configureJamf(['base_url' => FakeJamf::BASE_URL, 'username' => 'api-user', 'password' => 'api-password']);

    expect(Jamf::pro()->credentials()->usesApiClient())->toBeFalse()
        ->and(Jamf::pro()->credentials()->identity())->toBe('user:api-user')
        ->and(Jamf::baseUrl())->toBe(FakeJamf::BASE_URL);
});

it('says which setting the default connection is missing', function (array $settings, string $message) {
    configureJamf($settings);

    expect(fn () => Jamf::mobileDevices())->toThrow(InvalidArgumentException::class, $message);
})->with([
    'no address' => [['client_id' => 'id', 'client_secret' => 'secret'], 'The default Jamf connection needs a base_url.'],
    'an id without a secret' => [['base_url' => FakeJamf::BASE_URL, 'client_id' => 'id'], 'The default Jamf connection needs a client_secret.'],
    'a secret without an id' => [['base_url' => FakeJamf::BASE_URL, 'client_secret' => 'secret'], 'The default Jamf connection needs a client_id.'],
    'a username without a password' => [['base_url' => FakeJamf::BASE_URL, 'username' => 'user'], 'The default Jamf connection needs a password.'],
    'a password without a username' => [['base_url' => FakeJamf::BASE_URL, 'password' => 'pw'], 'The default Jamf connection needs a username.'],
    'no credentials' => [['base_url' => FakeJamf::BASE_URL], 'The default Jamf connection needs a client_id and client_secret, or a username and password.'],
]);

it('gives a named connection its own connectors, once', function () {
    config()->set('jamf.connections.other', ['base_url' => 'https://other.jamfcloud.test', 'username' => 'other-user', 'password' => 'pw']);

    $connection = Jamf::connection('other');

    expect($connection)->toBeInstanceOf(ProConnector::class)
        ->and($connection->resolveBaseUrl())->toBe('https://other.jamfcloud.test/api')
        ->and($connection->credentials()->identity())->toBe('user:other-user')
        ->and(Jamf::connection('other'))->toBe($connection)
        ->and(Jamf::pro('other'))->toBe($connection)
        ->and(Jamf::classic('other'))->toBeInstanceOf(ClassicConnector::class)
        ->and(Jamf::classic('other'))->toBe($connection->classic())
        ->and(Jamf::classic('other')->resolveBaseUrl())->toBe('https://other.jamfcloud.test/JSSResource');
});

it('says what a named connection is missing, or that there is no such connection', function () {
    config()->set('jamf.connections.broken', ['base_url' => 'https://other.jamfcloud.test', 'client_id' => 'id']);

    expect(fn () => Jamf::connection('broken'))->toThrow(InvalidArgumentException::class, 'The Jamf connection "broken" needs a client_secret.')
        ->and(fn () => Jamf::connection('nope'))->toThrow(InvalidArgumentException::class, 'No Jamf connection named "nope" is configured in jamf.connections.')
        ->and(fn () => Jamf::classic('nope'))->toThrow(InvalidArgumentException::class, 'No Jamf connection named "nope" is configured in jamf.connections.');
});

it('builds the default connectors once, the first time they are used', function () {
    configureJamf(['base_url' => FakeJamf::BASE_URL, 'username' => 'api-user', 'password' => 'api-password']);

    expect(Jamf::pro())->toBe(Jamf::pro())
        ->and(Jamf::classic())->toBe(Jamf::classic())
        ->and(Jamf::classic())->toBe(Jamf::pro()->classic());
});

it('refuses a method the connector does not have', function () {
    configureJamf(['base_url' => FakeJamf::BASE_URL, 'username' => 'api-user', 'password' => 'api-password']);

    expect(fn () => Jamf::nope())->toThrow(BadMethodCallException::class, 'Method nope does not exist.');
});
