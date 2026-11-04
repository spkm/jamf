<?php

use Saloon\Http\Faking\MockResponse;
use spkm\Jamf\Classic\Requests\Buildings\CreateBuildingByIdRequest;
use spkm\Jamf\Exceptions\InvalidRequestException;
use spkm\Jamf\Exceptions\NotFoundException;
use spkm\Jamf\Exceptions\RateLimitedException;
use spkm\Jamf\Exceptions\ServerErrorException;
use spkm\Jamf\Exceptions\UnauthorizedException;
use spkm\Jamf\JamfApiException;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateOauthTokenV1Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDeviceDetailV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDeviceV2Request;
use spkm\Jamf\Requests\AdhocRequest;
use spkm\Jamf\Tests\Fixtures\ExampleCreateRequest;
use spkm\Jamf\Tests\Fixtures\ExampleItemRequest;
use spkm\Jamf\Tests\Helpers\FakeJamf;

it('gives the exception callers handle for each status', function (int $status, string $class) {
    $response = FakeJamf::send(new ExampleItemRequest(7), ['httpStatus' => $status, 'errors' => []], $status);
    $exception = JamfApiException::fromResponse($response);

    expect($exception::class)->toBe($class)
        ->and($exception)->toBeInstanceOf(JamfApiException::class)
        ->and($exception->getResponse())->toBe($response)
        ->and(fn () => $response->dto())->toThrow($class);
})->with([
    [404, NotFoundException::class],
    [401, UnauthorizedException::class],
    [403, UnauthorizedException::class],
    [429, RateLimitedException::class],
    [400, InvalidRequestException::class],
    [405, InvalidRequestException::class],
    [409, InvalidRequestException::class],
    [412, InvalidRequestException::class],
    [415, InvalidRequestException::class],
    [422, InvalidRequestException::class],
    [408, ServerErrorException::class],
    [500, ServerErrorException::class],
    [502, ServerErrorException::class],
    [503, ServerErrorException::class],
    [418, JamfApiException::class],
]);

it('says how long to wait when Jamf limits the rate of calls', function () {
    $limited = JamfApiException::fromResponse(FakeJamf::send(new ExampleItemRequest(7), [], 429, ['Retry-After' => ' 30 ']));
    $unsaid = JamfApiException::fromResponse(FakeJamf::send(new ExampleItemRequest(7), [], 429));
    $date = JamfApiException::fromResponse(FakeJamf::send(new ExampleItemRequest(7), [], 429, ['Retry-After' => 'Wed, 04 Nov 2026 09:00:00 GMT']));

    expect($limited)->toBeInstanceOf(RateLimitedException::class)
        ->and($limited->retryAfter())->toBe(30)
        ->and($unsaid->retryAfter())->toBeNull()
        ->and($date->retryAfter())->toBeNull();
});

it('says what Jamf said was wrong, field by field', function () {
    $response = FakeJamf::send(new ExampleCreateRequest(['name' => '']), [
        'httpStatus' => 400,
        'errors' => [
            ['code' => 'INVALID_FIELD', 'field' => 'name', 'description' => 'must not be blank.', 'id' => '0'],
            ['code' => 'INVALID_FIELD', 'field' => 'name', 'description' => 'must not be blank.', 'id' => '0'],
            ['code' => 'DUPLICATE_FIELD', 'field' => null, 'description' => 'A building with that name exists', 'id' => '1'],
            ['code' => 'NO_DESCRIPTION'],
        ],
    ], 400);
    $exception = JamfApiException::fromResponse($response);

    expect($exception->getMessage())->toBe('Jamf responded 400 to POST /api/v1/examples: name: must not be blank; A building with that name exists; NO_DESCRIPTION')
        ->and($exception->errors())->toBe([
            ['code' => 'INVALID_FIELD', 'description' => 'must not be blank.', 'field' => 'name'],
            ['code' => 'INVALID_FIELD', 'description' => 'must not be blank.', 'field' => 'name'],
            ['code' => 'DUPLICATE_FIELD', 'description' => 'A building with that name exists', 'field' => null],
            ['code' => 'NO_DESCRIPTION', 'description' => null, 'field' => null],
        ]);
});

it('gives no causes for an answer without them', function () {
    $exception = JamfApiException::fromResponse(FakeJamf::send(new ExampleItemRequest(7), ['message' => 'Gone fishing.'], 503));

    expect($exception->errors())->toBe([])
        ->and($exception->getMessage())->toBe('Jamf responded 503 to GET /api/v1/examples/7: Gone fishing');
});

it('reads the token endpoint\'s own way of explaining a failure', function () {
    FakeJamf::respondWith([CreateOauthTokenV1Request::class => MockResponse::make(['error' => 'invalid_client', 'error_description' => 'Client authentication failed.'], 400)]);

    expect(fn () => FakeJamf::apiClient()->send(new ExampleItemRequest(7)))
        ->toThrow(InvalidRequestException::class, 'Jamf responded 400 to POST /api/v1/oauth/token: Client authentication failed');
});

it('reads the Classic API\'s HTML error page', function () {
    FakeJamf::respondWith([CreateBuildingByIdRequest::class => FakeJamf::classicError(409, 'Duplicate name')]);

    expect(fn () => FakeJamf::classic()->buildings()->create(['name' => 'Library']))
        ->toThrow(InvalidRequestException::class, 'Jamf responded 409 to POST /JSSResource/buildings/id/0: Duplicate name');
});

it('falls back to an HTML page\'s title, or says it was an HTML page', function () {
    $titled = JamfApiException::fromResponse(FakeJamf::send(new ExampleItemRequest(7), '<html><head><title>Service Unavailable</title></head><body><h1>Down</h1></body></html>', 503, ['Content-Type' => 'text/html']));
    $bare = JamfApiException::fromResponse(FakeJamf::send(new ExampleItemRequest(7), '<!DOCTYPE html><html><body>Down</body></html>', 502));

    expect($titled->getMessage())->toBe('Jamf responded 503 to GET /api/v1/examples/7: Service Unavailable')
        ->and($bare->getMessage())->toBe('Jamf responded 502 to GET /api/v1/examples/7 with an HTML error page');
});

it('treats a success that is not JSON as Jamf failing', function () {
    $response = FakeJamf::send(new ExampleItemRequest(7), 'Maintenance in progress', 200, ['Content-Type' => 'text/plain']);

    expect(fn () => $response->dto())->toThrow(ServerErrorException::class, 'Jamf responded 200 to GET /api/v1/examples/7 with a body that is not JSON');

    $page = FakeJamf::send(new ExampleItemRequest(7), '<html><head><title>Login</title></head></html>', 200, ['Content-Type' => 'text/html']);

    expect(fn () => $page->dto())->toThrow(ServerErrorException::class, 'Jamf responded 200 to GET /api/v1/examples/7: Login');
});

it('quotes a plain-text error body', function () {
    $exception = JamfApiException::fromResponse(FakeJamf::send(new ExampleItemRequest(7), 'Bad gateway', 502, ['Content-Type' => 'text/plain']));

    expect($exception->getMessage())->toBe('Jamf responded 502 to GET /api/v1/examples/7: Bad gateway');
});

it('cleans what Jamf said into one line of at most 200 characters, without the query string', function () {
    $long = FakeJamf::send(new ExampleItemRequest(7), ['httpStatus' => 400, 'errors' => [['description' => str_repeat('word ', 80)]]], 400);
    $messy = FakeJamf::send(new ExampleItemRequest(7), ['httpStatus' => 400, 'errors' => [['description' => "<b>bad</b>\n\tthing\x07"]]], 400);
    $queried = FakeJamf::connector();
    FakeJamf::respondWith([AdhocRequest::class => MockResponse::make([], 404)]);
    $withQuery = JamfApiException::fromResponse($queried->get('/v1/things', ['secret' => 'x']));

    $description = substr(JamfApiException::fromResponse($long)->getMessage(), strlen('Jamf responded 400 to GET /api/v1/examples/7: '));

    expect(mb_strlen($description))->toBeLessThanOrEqual(200)->toBeGreaterThan(190)
        ->and($description)->toStartWith('word word')
        ->and($description)->toEndWith('...')
        ->and(JamfApiException::fromResponse($messy)->getMessage())->toBe('Jamf responded 400 to GET /api/v1/examples/7: bad thing')
        ->and($withQuery->getMessage())->toBe('Jamf responded 404 to GET /api/v1/things')
        ->and($withQuery->getMessage())->not->toContain('secret');
});

it('throws the mapped exception from a resource, and gives null where it finds nothing', function () {
    FakeJamf::respondWith([
        GetMobileDeviceDetailV2Request::class => FakeJamf::problem(404, 'Mobile device not found', code: 'NOT_FOUND'),
        GetMobileDeviceV2Request::class => FakeJamf::problem(404, 'Mobile device not found', code: 'NOT_FOUND'),
    ]);
    $devices = FakeJamf::connector()->mobileDevices();

    expect(fn () => $devices->getMobileDeviceDetailV2(7))->toThrow(NotFoundException::class, 'Jamf responded 404 to GET /api/v2/mobile-devices/7/detail: Mobile device not found')
        ->and($devices->find(7))->toBeNull()
        ->and(fn () => $devices->findOrFail(7))->toThrow(NotFoundException::class);

    FakeJamf::respondWith([GetMobileDeviceDetailV2Request::class => FakeJamf::problem(403, 'Forbidden', code: 'FORBIDDEN')]);

    expect(fn () => FakeJamf::connector()->mobileDevices()->getMobileDeviceDetailV2(7))->toThrow(UnauthorizedException::class, 'Forbidden');
});
