<?php

namespace spkm\Jamf\Tests\Helpers;

use Illuminate\Support\Carbon;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use Saloon\Http\Request;
use Saloon\Http\Response;
use spkm\Jamf\Auth\Credentials;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateAuthTokenV1Request;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateOauthTokenV1Request;

class FakeJamf
{
    public const BASE_URL = 'https://school.jamfcloud.test';

    public const API_URL = 'https://school.jamfcloud.test/api';

    public const CLASSIC_URL = 'https://school.jamfcloud.test/JSSResource';

    /**
     * Fake Jamf: each request class (or URL pattern) answers with the given response. Unless told otherwise, Jamf
     * also hands out a token to an account or an API client.
     *
     * @param  array<class-string<Request>|string, MockResponse|callable(PendingRequest): MockResponse>  $responses
     */
    public static function respondWith(array $responses = [], bool $withTokens = true): MockClient
    {
        MockClient::destroyGlobal();

        $tokens = $withTokens ? [
            CreateAuthTokenV1Request::class => self::token(),
            CreateOauthTokenV1Request::class => self::oauthToken(),
        ] : [];

        return MockClient::global([...$tokens, ...$responses]);
    }

    /**
     * A connector to the Jamf Pro API, signed in with a user account.
     */
    public static function connector(string $baseUrl = self::BASE_URL): ProConnector
    {
        return new ProConnector(Credentials::account($baseUrl, 'api-user', 'api-password'));
    }

    /**
     * A connector to the Jamf Pro API, signed in with an API client.
     */
    public static function apiClient(string $baseUrl = self::BASE_URL): ProConnector
    {
        return new ProConnector(Credentials::apiClient($baseUrl, 'client-id', 'client-secret'));
    }

    /**
     * A connector to the Classic API, signed in with a user account.
     */
    public static function classic(string $baseUrl = self::BASE_URL): ClassicConnector
    {
        return self::connector($baseUrl)->classic();
    }

    /**
     * Jamf's answer to POST /v1/auth/token: a token and when it expires (20 minutes from now by default).
     */
    public static function token(string $token = 'fake-token', ?string $expires = null): MockResponse
    {
        return MockResponse::make(['token' => $token, 'expires' => $expires ?? Carbon::now()->addMinutes(20)->toIso8601ZuluString('millisecond')]);
    }

    /**
     * Jamf's answer to POST /v1/oauth/token: an access token that lasts $seconds.
     */
    public static function oauthToken(string $token = 'fake-oauth-token', int $seconds = 1199): MockResponse
    {
        return MockResponse::make(['access_token' => $token, 'scope' => 'api-role:1', 'token_type' => 'Bearer', 'expires_in' => $seconds]);
    }

    /**
     * A page of a Jamf Pro list: {"totalCount", "results"}.
     *
     * @param  list<array<string, mixed>>  $results
     */
    public static function page(array $results, ?int $totalCount = null): MockResponse
    {
        return MockResponse::make(['totalCount' => $totalCount ?? count($results), 'results' => $results]);
    }

    /**
     * The Jamf Pro API's answer to a failed request: {"httpStatus", "errors": [{"code", "description", "field"}]}.
     */
    public static function problem(int $status, string $description, ?string $field = null, string $code = 'INVALID_FIELD'): MockResponse
    {
        return MockResponse::make(['httpStatus' => $status, 'errors' => [['code' => $code, 'field' => $field, 'description' => $description, 'id' => '0']]], $status);
    }

    /**
     * The Classic API's answer to a failed request: an HTML page.
     */
    public static function classicError(int $status, string $message): MockResponse
    {
        return MockResponse::make("<html>\n<head>\n<title>Status page</title>\n</head>\n<body style=\"font-family: sans-serif;\">\n<p style=\"font-size: 1.2em;font-weight: bold;margin: 1em 0px;\">Conflict</p>\n<p>Error: $message</p>\n<p>You can get technical details <a href=\"http://www.w3.org/Protocols/rfc2616/rfc2616-sec10.html#sec10.4.10\">here</a>.<br>\nPlease continue your visit at our <a href=\"/\">home page</a>.\n</p>\n</body>\n</html>\n", $status, ['Content-Type' => 'text/html;charset=UTF-8']);
    }

    /**
     * Send one request through a connector (to the Classic API for a Classic request) to a faked Jamf that answers
     * it with the given body.
     *
     * @param  array<mixed>|string  $body
     * @param  array<string, string>  $headers
     */
    public static function send(Request $request, array|string $body = [], int $status = 200, array $headers = []): Response
    {
        self::respondWith([$request::class => MockResponse::make($body, $status, $headers)]);

        return $request instanceof ClassicRequest ? self::classic()->send($request) : self::connector()->send($request);
    }

    /**
     * The request Jamf received for the given request class, as Saloon built it.
     *
     * @param  class-string<Request>  $requestClass
     */
    public static function received(MockClient $mockClient, string $requestClass): PendingRequest
    {
        return $mockClient->findResponseByRequest($requestClass)->getPendingRequest();
    }

    /**
     * The responses Jamf gave to every request of the given class, in the order they were sent.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<Response>
     */
    public static function responsesTo(MockClient $mockClient, string $requestClass): array
    {
        return collect($mockClient->getRecordedResponses())
            ->filter(fn (Response $response) => $response->getRequest() instanceof $requestClass)
            ->values()
            ->all();
    }

    /**
     * The query strings Jamf received for every request of the given class, as sent on the wire.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<string>
     */
    public static function queriesReceived(MockClient $mockClient, string $requestClass): array
    {
        return array_map(fn (Response $response) => urldecode($response->getPsrRequest()->getUri()->getQuery()), self::responsesTo($mockClient, $requestClass));
    }

    /**
     * The URIs Jamf received for every request of the given class, as sent on the wire.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<string>
     */
    public static function urisReceived(MockClient $mockClient, string $requestClass): array
    {
        return array_map(fn (Response $response) => (string) $response->getPsrRequest()->getUri(), self::responsesTo($mockClient, $requestClass));
    }

    /**
     * The bodies Jamf received for every request of the given class, as sent on the wire.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<string>
     */
    public static function bodiesReceived(MockClient $mockClient, string $requestClass): array
    {
        return array_map(fn (Response $response) => (string) $response->getPsrRequest()->getBody(), self::responsesTo($mockClient, $requestClass));
    }

    /**
     * The Authorization header Jamf received with every request of the given class.
     *
     * @param  class-string<Request>  $requestClass
     * @return list<string>
     */
    public static function authorizationsReceived(MockClient $mockClient, string $requestClass): array
    {
        return array_map(fn (Response $response) => $response->getPsrRequest()->getHeaderLine('Authorization'), self::responsesTo($mockClient, $requestClass));
    }
}
