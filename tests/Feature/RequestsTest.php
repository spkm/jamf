<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockResponse;
use spkm\Jamf\Auth\Credentials;
use spkm\Jamf\Classic\Requests\Buildings\FindBuildingsByIdRequest;
use spkm\Jamf\Classic\Requests\Buildings\FindBuildingsRequest;
use spkm\Jamf\Exceptions\NotFoundException;
use spkm\Jamf\Exceptions\ServerErrorException;
use spkm\Jamf\Pro\Data\Building;
use spkm\Jamf\Pro\Data\GsxConnection;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ActivationCode\ExportActivationCodeHistoryV1Request;
use spkm\Jamf\Pro\Requests\AppRequestPreview\ReplaceAppRequestFormInputFieldsV1Request;
use spkm\Jamf\Pro\Requests\Branding\GetBrandingImagesDownloadV1Request;
use spkm\Jamf\Pro\Requests\Buildings\CreateBuildingsV1Request;
use spkm\Jamf\Pro\Requests\Buildings\DeleteBuildingV1Request;
use spkm\Jamf\Pro\Requests\Buildings\ExportBuildingsV1Request;
use spkm\Jamf\Pro\Requests\Buildings\GetBuildingV1Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryV3Request;
use spkm\Jamf\Pro\Requests\ComputerInventory\GetComputersInventoryV4Request;
use spkm\Jamf\Pro\Requests\GsxConnection\UpdateGsxConnectionV1Request;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDevicesV2Request;
use spkm\Jamf\Pro\Requests\Packages\UploadPackageV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\CreatePkiVenafiProxyTrustStoreV1Request;
use spkm\Jamf\Requests\AdhocBodyRequest;
use spkm\Jamf\Requests\AdhocListRequest;
use spkm\Jamf\Requests\AdhocRequest;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Tests\Fixtures\ExampleData;
use spkm\Jamf\Tests\Helpers\FakeJamf;

it('gives one record as the request\'s model', function () {
    $building = FakeJamf::send(new GetBuildingV1Request(5), ['id' => '5', 'name' => 'Library', 'city' => 'Cranleigh'])->dto();

    expect($building)->toBeInstanceOf(Building::class)
        ->and($building->name)->toBe('Library');
});

it('gives a page of records as a collection of the request\'s models', function () {
    $devices = FakeJamf::send(new GetMobileDevicesV2Request, ['totalCount' => 2, 'results' => [['id' => '1'], ['id' => '2']]])->dto();

    expect($devices)->toBeInstanceOf(Collection::class)
        ->and($devices)->toHaveCount(2)
        ->and($devices->first()::class)->toBe((new GetMobileDevicesV2Request)->dtoClass());
});

it('gives the decoded body for a raw answer and arrays for a list without a model', function () {
    expect(FakeJamf::send(new AdhocRequest(Method::GET, '/v1/anything'), ['a' => ['b' => 1]])->dto())->toBe(['a' => ['b' => 1]])
        ->and(FakeJamf::send(new AdhocListRequest('/v1/things'), ['totalCount' => 1, 'results' => [['id' => '1']]])->dto()->all())->toBe([['id' => '1']]);
});

it('gives null for an answer with nothing worth reading, and for an empty body', function () {
    expect(FakeJamf::send(new DeleteBuildingV1Request(5), '', 204)->dto())->toBeNull()
        ->and(FakeJamf::send(new GetBuildingV1Request(5), '')->dto())->toBeNull();
});

it('throws Jamf\'s error from dto() for an error status', function () {
    FakeJamf::send(new GetBuildingV1Request(5), ['httpStatus' => 404, 'errors' => [['code' => 'INVALID_ID', 'description' => 'Building not found']]], 404)->dto();
})->throws(NotFoundException::class, 'Building not found');

it('throws a server error from dto() for a success that is not JSON', function () {
    FakeJamf::send(new GetBuildingV1Request(5), 'Maintenance in progress', 200, ['Content-Type' => 'text/plain'])->dto();
})->throws(ServerErrorException::class);

it('takes the Classic API\'s answers out of the key that names their kind', function () {
    expect(FakeJamf::send(new FindBuildingsByIdRequest(5), ['building' => ['id' => 5, 'name' => 'Library']])->dto())->toBe(['id' => 5, 'name' => 'Library'])
        ->and(FakeJamf::send(new FindBuildingsRequest, ['buildings' => [['id' => 5, 'name' => 'Library'], ['id' => 6, 'name' => 'Gym']]])->dto()->all())
        ->toBe([['id' => 5, 'name' => 'Library'], ['id' => 6, 'name' => 'Gym']]);
});

it('gives a file as its body, asking for its type', function () {
    $response = FakeJamf::send(new GetBrandingImagesDownloadV1Request(3), "\x89PNG...", 200, ['Content-Type' => 'image/png']);

    expect($response->dto())->toBe("\x89PNG...")
        ->and($response->getPsrRequest()->getHeaderLine('Accept'))->toBe('image/*');
});

it('gives an export as CSV text, sending the export\'s options as JSON', function () {
    $response = FakeJamf::send(new ExportActivationCodeHistoryV1Request(['page' => 0]), "id,username\n1,admin\n", 200, ['Content-Type' => 'text/csv']);

    expect($response->dto())->toBe("id,username\n1,admin\n")
        ->and($response->getPsrRequest()->getHeaderLine('Accept'))->toBe('text/csv')
        ->and((string) $response->getPsrRequest()->getBody())->toBe('{"page":0}');
});

it('asks for JSON when the request says nothing else', function () {
    expect(FakeJamf::send(new GetBuildingV1Request(5), ['id' => '5'])->getPsrRequest()->getHeaderLine('Accept'))->toBe('application/json');
});

it('sends a merge patch with its own content type', function () {
    $response = FakeJamf::send(new UpdateGsxConnectionV1Request(['enabled' => true, 'username' => null]), ['enabled' => true]);
    $request = $response->getPsrRequest();

    expect($request->getMethod())->toBe('PATCH')
        ->and($request->getHeaderLine('Content-Type'))->toBe('application/merge-patch+json')
        ->and((string) $request->getBody())->toBe('{"enabled":true,"username":null}')
        ->and($response->dto())->toBeInstanceOf(GsxConnection::class);
});

it('sends a model as the JSON of its fields, leaving out its secrets', function () {
    $response = FakeJamf::send(new CreateBuildingsV1Request(new ExampleData(name: 'Library', password: 'x')), ['id' => '1', 'href' => '/v1/buildings/1'], 201);

    expect((string) $response->getPsrRequest()->getBody())->toBe('{"name":"Library"}')
        ->and($response->getPsrRequest()->getHeaderLine('Content-Type'))->toBe('application/json');
});

it('uploads a file as multipart form data, from its contents, a stream, or a file on disk', function (Closure $file, ?string $filename, string $expectedName) {
    $response = FakeJamf::send(new UploadPackageV1Request(9, $file(), $filename), ['id' => '9', 'href' => '/v1/packages/9']);
    $request = $response->getPsrRequest();
    $body = (string) $request->getBody();

    expect($request->getUri()->getPath())->toBe('/api/v1/packages/9/upload')
        ->and($request->getHeaderLine('Content-Type'))->toStartWith('multipart/form-data; boundary=')
        ->and($body)->toContain('name="file"; filename="'.$expectedName.'"')
        ->and($body)->toContain('PACKAGE BYTES');
})->with([
    'contents with a name' => [fn () => 'PACKAGE BYTES', 'Firefox.pkg', 'Firefox.pkg'],
    'contents without a name' => [fn () => 'PACKAGE BYTES', null, 'file'],
    'a stream' => [function () {
        $stream = fopen('php://memory', 'r+');
        fwrite($stream, 'PACKAGE BYTES');
        rewind($stream);

        return $stream;
    }, 'Stream.pkg', 'Stream.pkg'],
    'a file on disk' => [function () {
        $path = sys_get_temp_dir().'/jamf-test-Upload.pkg';
        file_put_contents($path, 'PACKAGE BYTES');

        return new SplFileInfo($path);
    }, null, 'jamf-test-Upload.pkg'],
]);

it('refuses to upload a file on disk it cannot read', function () {
    FakeJamf::send(new UploadPackageV1Request(9, new SplFileInfo('/no/such/file.pkg')), []);
})->throws(Exception::class, '/no/such/file.pkg');

it('sends text that is not JSON with its content type', function () {
    $response = FakeJamf::send(new CreatePkiVenafiProxyTrustStoreV1Request(4, "-----BEGIN CERTIFICATE-----\nABC\n-----END CERTIFICATE-----"), '', 204);
    $request = $response->getPsrRequest();

    expect($request->getHeaderLine('Content-Type'))->toBe('application/pem-certificate-chain')
        ->and((string) $request->getBody())->toBe("-----BEGIN CERTIFICATE-----\nABC\n-----END CERTIFICATE-----")
        ->and($response->dto())->toBeNull();
});

it('treats only a GET as safe to retry', function (JamfRequest $request, bool $safe) {
    expect($request->isSafe())->toBe($safe);
})->with([
    'a GET' => [new GetBuildingV1Request(1), true],
    'a list' => [new GetMobileDevicesV2Request, true],
    'a POST' => [new CreateBuildingsV1Request(['name' => 'x']), false],
    'a PATCH' => [new UpdateGsxConnectionV1Request([]), false],
    'a DELETE' => [new DeleteBuildingV1Request(1), false],
    'an ad-hoc GET' => [new AdhocRequest(Method::GET, '/v1/x'), true],
    'an ad-hoc POST' => [new AdhocRequest(Method::POST, '/v1/x'), false],
]);

it('answers a repeated GET from the cache when caching is on', function () {
    config()->set('jamf.cache.enabled', true);
    $sent = 0;
    FakeJamf::respondWith([GetBuildingV1Request::class => function () use (&$sent) {
        $sent++;

        return MockResponse::make(['id' => '5', 'name' => 'Library']);
    }]);
    $connector = FakeJamf::connector();

    $first = $connector->send(new GetBuildingV1Request(5));
    $second = $connector->send(new GetBuildingV1Request(5));

    expect($sent)->toBe(1)
        ->and($first->isCached())->toBeFalse()
        ->and($second->isCached())->toBeTrue()
        ->and($second->dto()->name)->toBe('Library');
});

it('never serves one account what another fetched', function () {
    config()->set('jamf.cache.enabled', true);
    $sent = 0;
    FakeJamf::respondWith([GetBuildingV1Request::class => function () use (&$sent) {
        $sent++;

        return MockResponse::make(['id' => '5']);
    }]);

    FakeJamf::connector()->send(new GetBuildingV1Request(5));
    FakeJamf::apiClient()->send(new GetBuildingV1Request(5));
    (new ProConnector(Credentials::account(FakeJamf::BASE_URL, 'someone-else', 'pw')))->send(new GetBuildingV1Request(5));
    FakeJamf::connector()->send(new GetBuildingV1Request(5));

    expect($sent)->toBe(3);
});

it('caches nothing when caching is off, and never caches a write', function () {
    $gets = 0;
    $posts = 0;
    FakeJamf::respondWith([
        GetBuildingV1Request::class => function () use (&$gets) {
            $gets++;

            return MockResponse::make(['id' => '5']);
        },
        CreateBuildingsV1Request::class => function () use (&$posts) {
            $posts++;

            return MockResponse::make(['id' => '6'], 201);
        },
    ]);
    $connector = FakeJamf::connector();

    $connector->send(new GetBuildingV1Request(5));
    $connector->send(new GetBuildingV1Request(5));
    config()->set('jamf.cache.enabled', true);
    $connector->send(new CreateBuildingsV1Request(['name' => 'x']));
    $connector->send(new CreateBuildingsV1Request(['name' => 'x']));

    expect($gets)->toBe(2)
        ->and($posts)->toBe(2);
});

it('sends an ad-hoc request to the path given, with its query and body', function () {
    $mock = FakeJamf::respondWith([
        AdhocRequest::class => MockResponse::make(['id' => '1']),
        AdhocBodyRequest::class => MockResponse::make(['id' => '2']),
        AdhocListRequest::class => FakeJamf::page([['id' => '3']]),
    ]);
    $connector = FakeJamf::connector();

    $connector->get('/v1/things/1', ['section' => ['GENERAL', 'HARDWARE']]);
    $connector->post('v1/things', new ExampleData(name: 'New'));
    $connector->put('/v1/things/2', ['name' => 'Replaced']);
    $connector->patch('/v1/things/2', ['name' => 'Changed']);
    $connector->delete('/v1/things/2');

    $plain = array_values(array_filter(FakeJamf::responsesTo($mock, AdhocRequest::class), fn ($response) => $response->getRequest()::class === AdhocRequest::class));

    expect(array_map(fn ($response) => $response->getPendingRequest()->getMethod()->value.' '.$response->getPsrRequest()->getUri(), $plain))->toBe([
        'GET '.FakeJamf::API_URL.'/v1/things/1?section=GENERAL&section=HARDWARE',
        'DELETE '.FakeJamf::API_URL.'/v1/things/2',
    ])
        ->and(FakeJamf::urisReceived($mock, AdhocBodyRequest::class))->toBe([
            FakeJamf::API_URL.'/v1/things',
            FakeJamf::API_URL.'/v1/things/2',
            FakeJamf::API_URL.'/v1/things/2',
        ])
        ->and(FakeJamf::bodiesReceived($mock, AdhocBodyRequest::class))->toBe(['{"name":"New"}', '{"name":"Replaced"}', '{"name":"Changed"}'])
        ->and(array_map(fn ($response) => $response->getPendingRequest()->getMethod()->value, FakeJamf::responsesTo($mock, AdhocBodyRequest::class)))->toBe(['POST', 'PUT', 'PATCH']);
});

it('gives an ad-hoc request the shape it is built with', function () {
    expect((new AdhocRequest(Method::GET, '/v1/x'))->responseShape())->toBe(JamfRequest::RAW)
        ->and((new AdhocRequest(Method::GET, '/v1/x', shape: JamfRequest::ONE))->responseShape())->toBe(JamfRequest::ONE)
        ->and((new AdhocBodyRequest(Method::POST, '/v1/x', [], shape: JamfRequest::NONE))->responseShape())->toBe(JamfRequest::NONE)
        ->and((new AdhocListRequest('/v1/x'))->responseShape())->toBe(JamfRequest::LIST)
        ->and(new AdhocBodyRequest(Method::POST, '/v1/x'))->toBeInstanceOf(HasBody::class)
        ->and(new AdhocRequest(Method::GET, '/v1/x'))->not->toBeInstanceOf(HasBody::class)
        ->and((new AdhocListRequest('/v1/x'))->filterable())->toBeTrue();
});

it('refuses an ad-hoc path that would climb out of the API', function (string $path) {
    (new AdhocRequest(Method::GET, $path))->resolveEndpoint();
})->with([['/v1/../../JSSResource/accounts'], ['./v1/x'], ['v1/things/..']])->throws(InvalidArgumentException::class);

it('marks a request for an endpoint Jamf has deprecated', function () {
    $doc = (string) (new ReflectionClass(GetComputersInventoryV3Request::class))->getDocComment();

    expect($doc)->toContain('@deprecated Jamf deprecated this endpoint')
        ->and((string) (new ReflectionClass(GetBuildingV1Request::class))->getDocComment())->not->toContain('@deprecated');
});

it('sends an empty JSON body as an object, as Jamf reads a body', function () {
    $mock = FakeJamf::respondWith([
        ExportBuildingsV1Request::class => MockResponse::make('id,name', 200, ['Content-Type' => 'text/csv']),
        ReplaceAppRequestFormInputFieldsV1Request::class => MockResponse::make([]),
        AdhocBodyRequest::class => MockResponse::make([]),
    ]);

    expect(FakeJamf::connector()->buildings()->exportBuildingsV1())->toBe('id,name');
    FakeJamf::connector()->appRequestPreview()->replaceAppRequestFormInputFieldsV1([]);
    FakeJamf::connector()->post('/v1/things');

    expect(FakeJamf::bodiesReceived($mock, ExportBuildingsV1Request::class))->toBe(['{}'])
        ->and(FakeJamf::bodiesReceived($mock, ReplaceAppRequestFormInputFieldsV1Request::class))->toBe(['[]'])
        ->and(FakeJamf::bodiesReceived($mock, AdhocBodyRequest::class))->toBe(['{}']);
});

it('writes a date into a filter in UTC with a Z, the form Jamf compares', function () {
    $mock = FakeJamf::respondWith([GetComputersInventoryV4Request::class => FakeJamf::page([])]);

    FakeJamf::connector()->computerInventory()->where('general.reportDate', '>', CarbonImmutable::parse('2026-10-04T10:30:00+01:00'))->limit(1)->get();

    expect(FakeJamf::queriesReceived($mock, GetComputersInventoryV4Request::class))
        ->toBe(['filter=general.reportDate>"2026-10-04T09:30:00.000Z"&page-size=1']);
});
