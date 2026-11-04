<?php

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Saloon\Config;
use Saloon\Enums\Method;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Response;
use spkm\Jamf\Auth\Credentials;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesByIdRequest;
use spkm\Jamf\Exceptions\UnauthorizedException;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateAuthTokenV1Request;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateOauthTokenV1Request;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\AdhocRequest;
use spkm\Jamf\Tests\Fixtures\ExampleCreateRequest;
use spkm\Jamf\Tests\Fixtures\ExampleItemRequest;
use spkm\Jamf\Tests\Fixtures\ExampleListRequest;
use spkm\Jamf\Tests\Helpers\FakeJamf;

function tokenCacheKey(string $identity, string $baseUrl = FakeJamf::BASE_URL): string
{
    return 'jamf.token.'.sha1($baseUrl.'|'.$identity);
}

it('talks to the Jamf Pro API under the server address', function () {
    $connector = FakeJamf::connector('https://school.jamfcloud.test/');

    expect($connector->resolveBaseUrl())->toBe('https://school.jamfcloud.test/api')
        ->and($connector->baseUrl())->toBe('https://school.jamfcloud.test');
});

it('contacts nobody when a connector is built', function () {
    $mockClient = FakeJamf::respondWith();

    FakeJamf::connector();
    FakeJamf::apiClient();
    FakeJamf::classic();

    expect($mockClient->getRecordedResponses())->toBe([]);
});

it('signs in with an account over basic auth, then sends its token as a bearer token', function () {
    $mockClient = FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make(['id' => '7'])]);

    FakeJamf::connector()->send(new ExampleItemRequest(7));

    expect(FakeJamf::urisReceived($mockClient, CreateAuthTokenV1Request::class))->toBe([FakeJamf::API_URL.'/v1/auth/token'])
        ->and(FakeJamf::received($mockClient, CreateAuthTokenV1Request::class)->getMethod()->value)->toBe('POST')
        ->and(FakeJamf::authorizationsReceived($mockClient, CreateAuthTokenV1Request::class))->toBe(['Basic '.base64_encode('api-user:api-password')])
        ->and(FakeJamf::authorizationsReceived($mockClient, ExampleItemRequest::class))->toBe(['Bearer fake-token']);
});

it('signs in with an API client by the client credentials grant, without an Authorization header', function () {
    $mockClient = FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make(['id' => '7'])]);

    FakeJamf::apiClient()->send(new ExampleItemRequest(7));

    parse_str(FakeJamf::bodiesReceived($mockClient, CreateOauthTokenV1Request::class)[0], $form);

    expect(FakeJamf::urisReceived($mockClient, CreateOauthTokenV1Request::class))->toBe([FakeJamf::API_URL.'/v1/oauth/token'])
        ->and($form)->toBe(['grant_type' => 'client_credentials', 'client_id' => 'client-id', 'client_secret' => 'client-secret'])
        ->and(FakeJamf::responsesTo($mockClient, CreateOauthTokenV1Request::class)[0]->getPsrRequest()->getHeaderLine('Content-Type'))->toBe('application/x-www-form-urlencoded')
        ->and(FakeJamf::authorizationsReceived($mockClient, CreateOauthTokenV1Request::class))->toBe([''])
        ->and(FakeJamf::authorizationsReceived($mockClient, ExampleItemRequest::class))->toBe(['Bearer fake-oauth-token'])
        ->and(FakeJamf::responsesTo($mockClient, CreateAuthTokenV1Request::class))->toBe([]);
});

it('caches the token encrypted and shares it with other connectors to the same server, Classic API included', function () {
    $mockClient = FakeJamf::respondWith([
        ExampleItemRequest::class => MockResponse::make(['id' => '7']),
        FindMobileDevicesByIdRequest::class => MockResponse::make(['mobile_device' => ['general' => ['id' => 7]]]),
    ]);

    FakeJamf::connector()->send(new ExampleItemRequest(7));
    FakeJamf::connector()->send(new ExampleItemRequest(8));
    FakeJamf::classic()->send(new FindMobileDevicesByIdRequest(7));

    $cached = Cache::get(tokenCacheKey('user:api-user'));
    $token = json_decode(Crypt::decryptString($cached), true);

    expect(FakeJamf::responsesTo($mockClient, CreateAuthTokenV1Request::class))->toHaveCount(1)
        ->and($cached)->toBeString()->not->toContain('fake-token')
        ->and($token['token'])->toBe('fake-token')
        ->and(FakeJamf::authorizationsReceived($mockClient, ExampleItemRequest::class))->toBe(['Bearer fake-token', 'Bearer fake-token'])
        ->and(FakeJamf::authorizationsReceived($mockClient, FindMobileDevicesByIdRequest::class))->toBe(['Bearer fake-token']);
});

it('keeps a separate token for each account and server', function () {
    $mockClient = FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make(['id' => '7'])]);

    FakeJamf::connector()->send(new ExampleItemRequest(7));
    FakeJamf::apiClient()->send(new ExampleItemRequest(7));
    FakeJamf::connector('https://other.jamfcloud.test')->send(new ExampleItemRequest(7));
    (new ProConnector(Credentials::account(FakeJamf::BASE_URL, 'someone-else', 'pw')))->send(new ExampleItemRequest(7));

    expect(FakeJamf::responsesTo($mockClient, CreateAuthTokenV1Request::class))->toHaveCount(3)
        ->and(FakeJamf::responsesTo($mockClient, CreateOauthTokenV1Request::class))->toHaveCount(1)
        ->and(Cache::has(tokenCacheKey('client:client-id')))->toBeTrue()
        ->and(Cache::has(tokenCacheKey('user:someone-else')))->toBeTrue()
        ->and(Cache::has(tokenCacheKey('user:api-user', 'https://other.jamfcloud.test')))->toBeTrue();
});

it('fetches a new token a minute before the one it holds expires', function () {
    Carbon::setTestNow('2026-11-04 09:00:00');
    $mockClient = FakeJamf::respondWith([
        CreateAuthTokenV1Request::class => fn () => FakeJamf::token(),
        ExampleItemRequest::class => MockResponse::make(['id' => '7']),
    ]);
    $connector = FakeJamf::connector();

    $connector->send(new ExampleItemRequest(7));
    Carbon::setTestNow('2026-11-04 09:18:59');
    $connector->send(new ExampleItemRequest(7));
    expect(FakeJamf::responsesTo($mockClient, CreateAuthTokenV1Request::class))->toHaveCount(1);

    Carbon::setTestNow('2026-11-04 09:19:00');
    $connector->send(new ExampleItemRequest(7));
    expect(FakeJamf::responsesTo($mockClient, CreateAuthTokenV1Request::class))->toHaveCount(2);
});

it('replaces a short-lived token halfway through its life', function () {
    Carbon::setTestNow('2026-11-04 09:00:00');
    $mockClient = FakeJamf::respondWith([
        CreateOauthTokenV1Request::class => fn () => FakeJamf::oauthToken(seconds: 60),
        ExampleItemRequest::class => MockResponse::make(['id' => '7']),
    ]);
    $connector = FakeJamf::apiClient();

    $connector->send(new ExampleItemRequest(7));
    $token = json_decode(Crypt::decryptString(Cache::get(tokenCacheKey('client:client-id'))), true);
    Carbon::setTestNow('2026-11-04 09:00:29');
    $connector->send(new ExampleItemRequest(7));
    expect(FakeJamf::responsesTo($mockClient, CreateOauthTokenV1Request::class))->toHaveCount(1);

    Carbon::setTestNow('2026-11-04 09:00:30');
    $connector->send(new ExampleItemRequest(7));

    expect($token['refresh_at'])->toBe($token['expires_at'] - 30)
        ->and(FakeJamf::responsesTo($mockClient, CreateOauthTokenV1Request::class))->toHaveCount(2);
});

it('fetches a new token and sends the request again, once, when Jamf answers 401', function () {
    $tokens = 0;
    $answers = 0;
    $mockClient = FakeJamf::respondWith([
        CreateAuthTokenV1Request::class => function () use (&$tokens) {
            return FakeJamf::token('token-'.++$tokens);
        },
        ExampleItemRequest::class => function () use (&$answers) {
            return ++$answers === 1 ? MockResponse::make(['httpStatus' => 401, 'errors' => []], 401) : MockResponse::make(['id' => '7']);
        },
    ]);

    $response = FakeJamf::connector()->send(new ExampleItemRequest(7));

    expect($response->status())->toBe(200)
        ->and(FakeJamf::authorizationsReceived($mockClient, ExampleItemRequest::class))->toBe(['Bearer token-1', 'Bearer token-2'])
        ->and(FakeJamf::responsesTo($mockClient, CreateAuthTokenV1Request::class))->toHaveCount(2);
});

it('gives up after one more try when Jamf keeps answering 401', function () {
    $mockClient = FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make([], 401)]);

    $response = FakeJamf::connector()->send(new ExampleItemRequest(7));

    expect($response->status())->toBe(401)
        ->and(FakeJamf::responsesTo($mockClient, ExampleItemRequest::class))->toHaveCount(2);
});

it('returns a 401 as it is when told not to sign in again', function () {
    config()->set('jamf.reauthenticate', false);
    $mockClient = FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make([], 401)]);

    $response = FakeJamf::connector()->send(new ExampleItemRequest(7));

    expect($response->status())->toBe(401)
        ->and(FakeJamf::responsesTo($mockClient, ExampleItemRequest::class))->toHaveCount(1)
        ->and(FakeJamf::responsesTo($mockClient, CreateAuthTokenV1Request::class))->toHaveCount(1);
});

it('says why Jamf refused to sign in', function () {
    FakeJamf::respondWith([CreateAuthTokenV1Request::class => FakeJamf::problem(401, 'Invalid credentials', code: 'INVALID_CREDENTIALS')]);

    expect(fn () => FakeJamf::connector()->send(new ExampleItemRequest(7)))
        ->toThrow(UnauthorizedException::class, 'Jamf responded 401 to POST /api/v1/auth/token: Invalid credentials');
});

it('forgets its token when asked, and fetches another for the next request', function () {
    $mockClient = FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make(['id' => '7'])]);
    $connector = FakeJamf::connector();

    $connector->send(new ExampleItemRequest(7));
    $connector->forgetToken();

    expect(Cache::has(tokenCacheKey('user:api-user')))->toBeFalse()
        ->and($connector->getAuthenticator())->toBeNull();

    $connector->send(new ExampleItemRequest(7));

    expect(FakeJamf::responsesTo($mockClient, CreateAuthTokenV1Request::class))->toHaveCount(2);
});

it('ignores a cached token it cannot decrypt', function () {
    Cache::put(tokenCacheKey('user:api-user'), 'not-encrypted', 600);
    $mockClient = FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make(['id' => '7'])]);

    FakeJamf::connector()->send(new ExampleItemRequest(7));

    expect(FakeJamf::responsesTo($mockClient, CreateAuthTokenV1Request::class))->toHaveCount(1)
        ->and(FakeJamf::authorizationsReceived($mockClient, ExampleItemRequest::class))->toBe(['Bearer fake-token']);
});

it('keeps secrets and the token out of dumps', function () {
    FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make(['id' => '7'])]);
    $connector = FakeJamf::connector();

    expect($connector->__debugInfo())->toBe(['baseUrl' => FakeJamf::BASE_URL, 'identity' => 'user:api-user', 'token' => null]);

    $connector->send(new ExampleItemRequest(7));
    ob_start();
    var_dump($connector, $connector->credentials(), Credentials::apiClient(FakeJamf::BASE_URL, 'client-id', 'client-secret'));
    $dump = (string) ob_get_clean();

    expect($connector->__debugInfo()['token'])->toBe('[redacted]')
        ->and($dump)->not->toContain('api-password')
        ->and($dump)->not->toContain('client-secret')
        ->and($dump)->not->toContain('fake-token')
        ->and($dump)->toContain('[redacted]');
});

it('refuses to serialise a connector or credentials', function () {
    expect(fn () => serialize(FakeJamf::connector()))->toThrow(LogicException::class, 'A Jamf connector cannot be serialised')
        ->and(fn () => serialize(FakeJamf::classic()))->toThrow(LogicException::class)
        ->and(fn () => serialize(Credentials::account(FakeJamf::BASE_URL, 'u', 'p')))->toThrow(LogicException::class, 'Jamf credentials cannot be serialised');
});

it('checks credentials as they are built', function () {
    $client = Credentials::apiClient(FakeJamf::BASE_URL, 'client-id', 'secret');
    $account = Credentials::account(FakeJamf::BASE_URL, 'user', 'secret');

    expect($client->usesApiClient())->toBeTrue()
        ->and($client->identity())->toBe('client:client-id')
        ->and($account->usesApiClient())->toBeFalse()
        ->and($account->identity())->toBe('user:user')
        ->and(fn () => Credentials::account(' ', 'user', 'secret'))->toThrow(InvalidArgumentException::class, "Jamf credentials need the server's address.")
        ->and(fn () => Credentials::account(FakeJamf::BASE_URL, '', 'secret'))->toThrow(InvalidArgumentException::class, 'A Jamf account needs a username and a password.')
        ->and(fn () => Credentials::account(FakeJamf::BASE_URL, 'user', ''))->toThrow(InvalidArgumentException::class, 'A Jamf account needs a username and a password.')
        ->and(fn () => Credentials::apiClient(FakeJamf::BASE_URL, '', 'secret'))->toThrow(InvalidArgumentException::class, 'An API client needs a client id and a client secret.')
        ->and(fn () => Credentials::apiClient(FakeJamf::BASE_URL, 'id', ''))->toThrow(InvalidArgumentException::class, 'An API client needs a client id and a client secret.');
});

it('takes its timeouts and retries from config', function () {
    config()->set('jamf.timeouts', ['connect' => 3, 'request' => 7]);
    config()->set('jamf.retries', ['times' => 3, 'interval_ms' => 1]);
    $connector = FakeJamf::connector();

    expect($connector->getConnectTimeout())->toBe(3.0)
        ->and($connector->getRequestTimeout())->toBe(7.0)
        ->and($connector->tries)->toBe(3)
        ->and($connector->retryInterval)->toBe(1)
        ->and($connector->useExponentialBackoff)->toBeTrue()
        ->and($connector->throwOnMaxTries)->toBeFalse();
});

it('falls back to the default timeouts when config gives none, zero or nonsense', function (mixed $value) {
    config()->set('jamf.timeouts', ['connect' => $value, 'request' => $value]);
    $connector = FakeJamf::connector();

    expect($connector->getConnectTimeout())->toBe((float) Config::$defaultConnectionTimeout)
        ->and($connector->getRequestTimeout())->toBe((float) Config::$defaultRequestTimeout)
        ->and($connector->tries)->toBeNull();
})->with([null, 0, -5, 'abc']);

it('retries a GET, not a write, on a server error, a timeout or too many requests', function (int $status) {
    config()->set('jamf.retries', ['times' => 3, 'interval_ms' => 1]);
    $mockClient = FakeJamf::respondWith([
        ExampleItemRequest::class => MockResponse::make([], $status),
        ExampleCreateRequest::class => MockResponse::make([], $status),
    ]);
    $connector = FakeJamf::connector();

    $connector->send(new ExampleItemRequest(1));
    $connector->send(new ExampleCreateRequest(['name' => 'x']));

    expect(FakeJamf::responsesTo($mockClient, ExampleItemRequest::class))->toHaveCount(3)
        ->and(FakeJamf::responsesTo($mockClient, ExampleCreateRequest::class))->toHaveCount(1);
})->with([500, 503, 408, 429]);

it('does not retry a GET that Jamf refused', function () {
    config()->set('jamf.retries', ['times' => 3, 'interval_ms' => 1]);
    $mockClient = FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make([], 404)]);

    $response = FakeJamf::connector()->send(new ExampleItemRequest(1));

    expect($response->status())->toBe(404)
        ->and(FakeJamf::responsesTo($mockClient, ExampleItemRequest::class))->toHaveCount(1);
});

it('retries a GET, not a write, when the connection fails', function () {
    FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make([])]);
    $connector = FakeJamf::connector();
    $fatal = new FatalRequestException(new RuntimeException('down'), $connector->createPendingRequest(new ExampleItemRequest(1)));

    expect($connector->handleRetry($fatal, new ExampleItemRequest(1)))->toBeTrue()
        ->and($connector->handleRetry($fatal, new ExampleCreateRequest([])))->toBeFalse()
        ->and($connector->handleRetry($fatal, new AdhocRequest(Method::GET, '/v1/x')))->toBeTrue()
        ->and($connector->handleRetry($fatal, new AdhocRequest(Method::DELETE, '/v1/x')))->toBeFalse();
});

it('repeats a parameter with several values, as Jamf reads it', function () {
    $mockClient = FakeJamf::respondWith([
        ExampleListRequest::class => FakeJamf::page([]),
        AdhocRequest::class => MockResponse::make([]),
    ]);

    FakeJamf::connector()->send(new ExampleListRequest(Query::make()->sections(['GENERAL', 'hardware'])));
    FakeJamf::connector()->get('/v1/things?keep=a=b', ['id' => [1, 2], 'flag' => true]);

    expect(FakeJamf::queriesReceived($mockClient, ExampleListRequest::class))->toBe(['section=GENERAL&section=HARDWARE'])
        ->and(FakeJamf::queriesReceived($mockClient, AdhocRequest::class))->toBe(['keep=a=b&id=1&id=2&flag=true']);
});

it('makes ad-hoc calls by method and path', function () {
    $mockClient = FakeJamf::respondWith([FakeJamf::API_URL.'/v1/*' => MockResponse::make(['id' => '9'])]);
    $connector = FakeJamf::connector();

    $responses = [
        $connector->get('/v1/buildings', ['page' => 2]),
        $connector->post('/v1/buildings', ['name' => 'Library']),
        $connector->put('/v1/buildings/9', ['name' => 'Old Library']),
        $connector->patch('v1/buildings/9', ['city' => 'Cranleigh']),
        $connector->delete('/v1/buildings/9'),
    ];
    $sent = collect($mockClient->getRecordedResponses())
        ->reject(fn (Response $response) => $response->getRequest() instanceof CreateAuthTokenV1Request)
        ->map(fn (Response $response) => [
            $response->getPsrRequest()->getMethod(),
            (string) $response->getPsrRequest()->getUri(),
            (string) $response->getPsrRequest()->getBody(),
        ])
        ->values()
        ->all();

    expect($responses[0]->json())->toBe(['id' => '9'])
        ->and($sent)->toBe([
            ['GET', FakeJamf::API_URL.'/v1/buildings?page=2', ''],
            ['POST', FakeJamf::API_URL.'/v1/buildings', '{"name":"Library"}'],
            ['PUT', FakeJamf::API_URL.'/v1/buildings/9', '{"name":"Old Library"}'],
            ['PATCH', FakeJamf::API_URL.'/v1/buildings/9', '{"city":"Cranleigh"}'],
            ['DELETE', FakeJamf::API_URL.'/v1/buildings/9', ''],
        ]);
});

it('refuses a path that would leave the endpoint it names', function () {
    FakeJamf::respondWith([AdhocRequest::class => MockResponse::make([])]);

    expect(fn () => FakeJamf::connector()->get('/v1/../secret'))->toThrow(InvalidArgumentException::class, 'is not a path Jamf serves')
        ->and(fn () => (new ExampleItemRequest('..'))->resolveEndpoint())->toThrow(InvalidArgumentException::class, 'cannot be used in a request path')
        ->and(fn () => (new ExampleItemRequest(''))->resolveEndpoint())->toThrow(InvalidArgumentException::class)
        ->and((new ExampleItemRequest('a/b c'))->resolveEndpoint())->toBe('/v1/examples/a%2Fb%20c')
        ->and((new ExampleItemRequest('1,2,3'))->resolveEndpoint())->toBe('/v1/examples/1,2,3');
});

it('gives the same server\'s Classic API from classic(), once', function () {
    $connector = FakeJamf::connector();

    expect($connector->classic())->toBe($connector->classic())
        ->and($connector->classic()->credentials())->toBe($connector->credentials())
        ->and($connector->classic()->pro())->toBe($connector);
});
