<?php

use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use Saloon\Http\Response;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\Buildings\CreateBuildingByIdRequest;
use spkm\Jamf\Classic\Requests\ClassicAdhocRequest;
use spkm\Jamf\Classic\Requests\ComputerGroups\CreateComputerGroupByIdRequest;
use spkm\Jamf\Classic\Requests\FileUploads\UploadFilesRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\CreateMobileDeviceByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\DeleteMobileDeviceByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\UpdateMobileDeviceByIdRequest;
use spkm\Jamf\Exceptions\NotFoundException;
use spkm\Jamf\Facades\Jamf;
use spkm\Jamf\Pro\Requests\ApiAuthentication\CreateAuthTokenV1Request;
use spkm\Jamf\Support\Xml;
use spkm\Jamf\Tests\Helpers\FakeJamf;

function xmlAnswer(string $xml): MockResponse
{
    return MockResponse::make('<?xml version="1.0" encoding="UTF-8"?>'.$xml, 201, ['Content-Type' => 'text/xml;charset=UTF-8']);
}

/**
 * Every call the faked Jamf received apart from token requests: method, URI and body.
 *
 * @return list<array{string, string, string}>
 */
function classicCalls(MockClient $mockClient): array
{
    return collect($mockClient->getRecordedResponses())
        ->reject(fn (Response $response) => $response->getRequest() instanceof CreateAuthTokenV1Request)
        ->map(fn (Response $response) => [$response->getPsrRequest()->getMethod(), (string) $response->getPsrRequest()->getUri(), (string) $response->getPsrRequest()->getBody()])
        ->values()
        ->all();
}

it('talks to the Classic API under the server address, asking for JSON with the shared token', function () {
    $mockClient = FakeJamf::respondWith([FindMobileDevicesByIdRequest::class => MockResponse::make(['mobile_device' => ['general' => ['id' => 61, 'name' => 'iPad 61']]])]);
    $classic = FakeJamf::classic('https://school.jamfcloud.test/');

    $response = $classic->send(new FindMobileDevicesByIdRequest(61));
    $sent = $response->getPsrRequest();

    expect($classic->resolveBaseUrl())->toBe(FakeJamf::CLASSIC_URL)
        ->and($classic->baseUrl())->toBe(FakeJamf::BASE_URL)
        ->and((string) $sent->getUri())->toBe(FakeJamf::CLASSIC_URL.'/mobiledevices/id/61')
        ->and($sent->getHeaderLine('Accept'))->toBe('application/json')
        ->and($sent->getHeaderLine('Authorization'))->toBe('Bearer fake-token')
        ->and(FakeJamf::urisReceived($mockClient, CreateAuthTokenV1Request::class))->toBe([FakeJamf::API_URL.'/v1/auth/token'])
        ->and($response->dto())->toBe(['general' => ['id' => 61, 'name' => 'iPad 61']]);
});

it('lists a collection\'s records without the key that names them', function () {
    FakeJamf::respondWith([FindMobileDevicesRequest::class => MockResponse::make(['mobile_devices' => [['id' => 1, 'name' => 'iPad 1'], ['id' => 2, 'name' => 'iPad 2']]])]);

    $devices = FakeJamf::classic()->mobileDevices()->get();

    expect($devices)->toBeInstanceOf(Collection::class)
        ->and($devices->all())->toBe([['id' => 1, 'name' => 'iPad 1'], ['id' => 2, 'name' => 'iPad 2']])
        ->and(FakeJamf::classic()->mobileDevices()->all()->pluck('id')->all())->toBe([1, 2])
        ->and(FakeJamf::classic()->mobileDevices()->count())->toBe(2);
});

it('finds a record by id, or gives null when Jamf has none', function () {
    FakeJamf::respondWith([
        FindMobileDevicesByIdRequest::class => fn (PendingRequest $request) => str_ends_with($request->getUrl(), '/61')
            ? MockResponse::make(['mobile_device' => ['general' => ['id' => 61]]])
            : FakeJamf::classicError(404, 'Not Found'),
    ]);
    $devices = FakeJamf::classic()->mobileDevices();

    expect($devices->find(61))->toBe(['general' => ['id' => 61]])
        ->and($devices->find(62))->toBeNull()
        ->and($devices->findOrFail(61))->toBe(['general' => ['id' => 61]])
        ->and(fn () => $devices->findOrFail(62))->toThrow(NotFoundException::class);
});

it('creates, updates and deletes a record, writing it as XML under the element that names its kind', function () {
    $mockClient = FakeJamf::respondWith([
        CreateMobileDeviceByIdRequest::class => xmlAnswer('<mobile_device><id>5</id></mobile_device>'),
        UpdateMobileDeviceByIdRequest::class => xmlAnswer('<mobile_device><id>61</id></mobile_device>'),
        DeleteMobileDeviceByIdRequest::class => xmlAnswer('<mobile_device><id>61</id></mobile_device>'),
    ]);
    $devices = FakeJamf::classic()->mobileDevices();

    $created = $devices->create(['general' => ['name' => 'iPad & Co', 'asset_tag' => 'A1', 'managed' => true]]);
    $updated = $devices->update(61, ['location' => ['username' => 'jbloggs']]);
    $deleted = $devices->delete(61);

    expect($created)->toBe(['id' => '5'])
        ->and($updated)->toBe(['id' => '61'])
        ->and($deleted)->toBeTrue()
        ->and(classicCalls($mockClient))->toBe([
            ['POST', FakeJamf::CLASSIC_URL.'/mobiledevices/id/0', '<mobile_device><general><name>iPad &amp; Co</name><asset_tag>A1</asset_tag><managed>true</managed></general></mobile_device>'],
            ['PUT', FakeJamf::CLASSIC_URL.'/mobiledevices/id/61', '<mobile_device><location><username>jbloggs</username></location></mobile_device>'],
            ['DELETE', FakeJamf::CLASSIC_URL.'/mobiledevices/id/61', ''],
        ])
        ->and(FakeJamf::received($mockClient, CreateMobileDeviceByIdRequest::class)->headers()->get('Content-Type'))->toBe('application/xml');
});

it('sends a record given as XML as it is', function () {
    $mockClient = FakeJamf::respondWith([CreateMobileDeviceByIdRequest::class => xmlAnswer('<mobile_device><id>5</id></mobile_device>')]);
    $xml = '<mobile_device><general><name>Raw</name></general></mobile_device>';

    FakeJamf::classic()->mobileDevices()->create($xml);

    expect(FakeJamf::bodiesReceived($mockClient, CreateMobileDeviceByIdRequest::class))->toBe([$xml]);
});

it('writes a list as one element per record, named for the singular of the list', function () {
    $mockClient = FakeJamf::respondWith([CreateComputerGroupByIdRequest::class => xmlAnswer('<computer_group><id>3</id></computer_group>')]);

    FakeJamf::classic()->computerGroups()->create([
        'name' => 'Lab Macs',
        'is_smart' => false,
        'computers' => [['id' => 1], ['id' => 2]],
        'criteria' => [['criterion' => ['name' => 'Building', 'value' => 'Library']]],
        'empty' => null,
    ]);

    expect(FakeJamf::bodiesReceived($mockClient, CreateComputerGroupByIdRequest::class))->toBe([
        '<computer_group><name>Lab Macs</name><is_smart>false</is_smart><computers><computer><id>1</id></computer><computer><id>2</id></computer></computers><criteria><criterion><name>Building</name><value>Library</value></criterion></criteria><empty/></computer_group>',
    ]);
});

it('refuses a name XML does not allow rather than send something Jamf would misread', function () {
    expect(fn () => Xml::fromArray('mobile device', []))->toThrow(InvalidArgumentException::class, '"mobile device" cannot be an XML element name.')
        ->and(fn () => Xml::fromArray('mobile_device', ['<general>' => 'x']))->toThrow(InvalidArgumentException::class)
        ->and(fn () => Xml::fromArray('mobile_device', ['general' => new stdClass]))->toThrow(InvalidArgumentException::class, 'cannot be written as XML');
});

it('reads an XML answer, making a repeated element a list', function () {
    FakeJamf::respondWith([ClassicAdhocRequest::class => xmlAnswer('<computers><size>2</size><computer><id>1</id></computer><computer><id>2</id></computer></computers>')]);

    expect(FakeJamf::classic()->get('/computers')->dto())->toBe(['size' => '2', 'computer' => [['id' => '1'], ['id' => '2']]]);
});

it('makes ad-hoc calls by method and path', function () {
    $mockClient = FakeJamf::respondWith([FakeJamf::CLASSIC_URL.'/*' => xmlAnswer('<building><id>3</id></building>')]);
    $classic = FakeJamf::classic();

    $classic->get('/buildings', ['x' => 1]);
    $classic->post('/buildings/id/0', ['building' => ['name' => 'Library']]);
    $classic->put('buildings/id/3', '<building><name>Old Library</name></building>');
    $classic->post('/computercommands/command/BlankPush/id/1,2');
    $classic->delete('/buildings/id/3');

    expect(classicCalls($mockClient))->toBe([
        ['GET', FakeJamf::CLASSIC_URL.'/buildings?x=1', ''],
        ['POST', FakeJamf::CLASSIC_URL.'/buildings/id/0', '<building><name>Library</name></building>'],
        ['PUT', FakeJamf::CLASSIC_URL.'/buildings/id/3', '<building><name>Old Library</name></building>'],
        ['POST', FakeJamf::CLASSIC_URL.'/computercommands/command/BlankPush/id/1,2', ''],
        ['DELETE', FakeJamf::CLASSIC_URL.'/buildings/id/3', ''],
    ]);
});

it('needs an ad-hoc record under the one key that names its kind', function (array $record) {
    FakeJamf::respondWith([FakeJamf::CLASSIC_URL.'/*' => xmlAnswer('<building><id>3</id></building>')]);

    expect(fn () => FakeJamf::classic()->post('/buildings/id/0', $record))
        ->toThrow(InvalidArgumentException::class, 'A Classic API record goes under the one key that names its kind');
})->with([
    'no kind' => [['name' => 'Library']],
    'two kinds' => [['building' => ['name' => 'A'], 'department' => ['name' => 'B']]],
]);

it('gives a builder over any Classic collection with from()', function () {
    $mockClient = FakeJamf::respondWith([FakeJamf::CLASSIC_URL.'/*' => MockResponse::make(['things' => [['id' => 3, 'name' => 'x']]])]);
    $things = FakeJamf::classic()->from('/things', 'thing');

    $listed = $things->get();
    $things->find(3);
    $things->create(['name' => 'x']);
    $things->update(3, ['name' => 'y']);
    $things->delete(3);

    expect($listed->all())->toBe([['id' => 3, 'name' => 'x']])
        ->and(classicCalls($mockClient))->toBe([
            ['GET', FakeJamf::CLASSIC_URL.'/things', ''],
            ['GET', FakeJamf::CLASSIC_URL.'/things/id/3', ''],
            ['POST', FakeJamf::CLASSIC_URL.'/things/id/0', '<thing><name>x</name></thing>'],
            ['PUT', FakeJamf::CLASSIC_URL.'/things/id/3', '<thing><name>y</name></thing>'],
            ['DELETE', FakeJamf::CLASSIC_URL.'/things/id/3', ''],
        ]);
});

it('reaches the same server\'s Jamf Pro API with the same credentials', function () {
    $classic = FakeJamf::classic();

    expect($classic->pro()->credentials())->toBe($classic->credentials())
        ->and($classic->pro()->resolveBaseUrl())->toBe(FakeJamf::API_URL)
        ->and($classic->pro()->classic())->toBeInstanceOf(ClassicConnector::class);
});

it('reaches the Classic API from the facade', function () {
    config()->set('jamf.base_url', FakeJamf::BASE_URL);
    config()->set('jamf.username', 'api-user');
    config()->set('jamf.password', 'api-password');
    $mockClient = FakeJamf::respondWith([CreateBuildingByIdRequest::class => xmlAnswer('<building><id>9</id></building>')]);

    expect(Jamf::classic()->buildings()->create(['name' => 'Library']))->toBe(['id' => '9'])
        ->and(FakeJamf::urisReceived($mockClient, CreateBuildingByIdRequest::class))->toBe([FakeJamf::CLASSIC_URL.'/buildings/id/0']);
});

it('uploads a file to a record as multipart form data named "name"', function () {
    $mockClient = FakeJamf::respondWith([UploadFilesRequest::class => MockResponse::make('', 201)]);
    $path = tempnam(sys_get_temp_dir(), 'jamf');
    file_put_contents($path, 'file on disk');

    FakeJamf::classic()->fileUploads()->uploadFiles('computers', 'id', 7, 'icon contents', 'icon.png');
    FakeJamf::classic()->send(new UploadFilesRequest('policies', 'name', 'Install Office', new SplFileInfo($path)));
    unlink($path);

    [$string, $file] = FakeJamf::bodiesReceived($mockClient, UploadFilesRequest::class);

    expect(FakeJamf::urisReceived($mockClient, UploadFilesRequest::class))->toBe([
        FakeJamf::CLASSIC_URL.'/fileuploads/computers/id/7',
        FakeJamf::CLASSIC_URL.'/fileuploads/policies/name/Install%20Office',
    ])
        ->and($string)->toContain('name="name"; filename="icon.png"')->toContain('icon contents')
        ->and($file)->toContain('filename="'.basename($path).'"')->toContain('file on disk')
        ->and(FakeJamf::responsesTo($mockClient, UploadFilesRequest::class)[0]->getPsrRequest()->getHeaderLine('Content-Type'))->toStartWith('multipart/form-data');
});
