<?php

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Saloon\Enums\Method;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use spkm\Jamf\Exceptions\NotFoundException;
use spkm\Jamf\JamfPaginator;
use spkm\Jamf\Pro\Data\MobileDeviceDetailsV2;
use spkm\Jamf\Pro\Data\MobileDeviceResponse;
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDevicesDetailV2Request;
use spkm\Jamf\Pro\Requests\MobileDevices\UpdateMobileDeviceV2Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Filter;
use spkm\Jamf\Query\Operator;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\AdhocBodyRequest;
use spkm\Jamf\Requests\AdhocListRequest;
use spkm\Jamf\Requests\AdhocRequest;
use spkm\Jamf\Resources\PagedResource;
use spkm\Jamf\Tests\Fixtures\ExampleCreateRequest;
use spkm\Jamf\Tests\Fixtures\ExampleData;
use spkm\Jamf\Tests\Fixtures\ExampleDeleteRequest;
use spkm\Jamf\Tests\Fixtures\ExampleItemRequest;
use spkm\Jamf\Tests\Fixtures\ExampleListRequest;
use spkm\Jamf\Tests\Fixtures\ExampleReadOnlyResource;
use spkm\Jamf\Tests\Fixtures\ExampleResource;
use spkm\Jamf\Tests\Fixtures\ExampleUpdateRequest;
use spkm\Jamf\Tests\Helpers\FakeJamf;

function exampleBuilder(): ExampleResource
{
    return new ExampleResource(FakeJamf::connector());
}

/**
 * The query string the builder sends for one page of what it was told.
 */
function builderQueryFor(Closure $build): string
{
    $mock = FakeJamf::respondWith([ExampleListRequest::class => FakeJamf::page([['id' => '1']], 1)]);

    $build(exampleBuilder())->limit(10)->get();

    return FakeJamf::queriesReceived($mock, ExampleListRequest::class)[0];
}

/**
 * A faked list of $total records that answers each page by its page and page-size parameters.
 *
 * @param  Closure(int): array<string, mixed>|null  $record
 */
function builderPagesOf(int $total, ?Closure $record = null): Closure
{
    $record ??= fn (int $id) => ['id' => (string) $id, 'name' => "Device $id"];

    return function (PendingRequest $request) use ($total, $record): MockResponse {
        $page = (int) $request->query()->get('page', 0);
        $size = (int) $request->query()->get('page-size', 100);
        $results = [];

        for ($id = $page * $size + 1; $id <= min($total, ($page + 1) * $size); $id++) {
            $results[] = $record($id);
        }

        return FakeJamf::page($results, $total);
    };
}

it('sends a condition as an RSQL filter', function (Closure $build, string $filter) {
    expect(builderQueryFor($build))->toBe("filter=$filter&page-size=10");
})->with([
    'equal' => [fn (Builder $q) => $q->where('general.name', 'iPad 1'), 'general.name=="iPad 1"'],
    'greater than' => [fn (Builder $q) => $q->where('id', '>', 5), 'id>5'],
    '= as ==' => [fn (Builder $q) => $q->where('id', '=', 5), 'id==5'],
    '<> as !=' => [fn (Builder $q) => $q->where('general.assetTag', '<>', 'A*'), 'general.assetTag!="A*"'],
    'in' => [fn (Builder $q) => $q->where('id', 'in', [1, 2]), 'id=in=(1,2)'],
    'not in' => [fn (Builder $q) => $q->where('id', 'not in', [3]), 'id=out=(3)'],
    '=lt=' => [fn (Builder $q) => $q->where('id', '=lt=', 9), 'id<9'],
    'an Operator' => [fn (Builder $q) => $q->where('id', Operator::GreaterOrEqual, 4), 'id>=4'],
    'two ANDed' => [fn (Builder $q) => $q->where('id', '>', 5)->where('managed', true), 'id>5;managed==true'],
    'whereNot' => [fn (Builder $q) => $q->whereNot('general.name', 'Spare'), 'general.name!="Spare"'],
    'whereIn' => [fn (Builder $q) => $q->whereIn('general.name', ['a', 'b']), 'general.name=in=("a","b")'],
    'whereNotIn' => [fn (Builder $q) => $q->whereNotIn('id', collect([7, 8])), 'id=out=(7,8)'],
    'whereBetween' => [fn (Builder $q) => $q->whereBetween('id', [10, 20]), 'id>=10;id<=20'],
    'whereContains' => [fn (Builder $q) => $q->whereContains('general.name', 'Lab'), 'general.name=="*Lab*"'],
    'orWhere' => [fn (Builder $q) => $q->where('id', 1)->orWhere('id', 2), 'id==1,id==2'],
    'orWhere with an operator' => [fn (Builder $q) => $q->where('id', 1)->orWhere('id', '>', 100), 'id==1,id>100'],
    'orWhere a group' => [fn (Builder $q) => $q->where('managed', true)->orWhere(fn (Builder $g) => $g->where('id', 1)->where('name', 'x')), 'managed==true,(id==1;name=="x")'],
    'where a group' => [fn (Builder $q) => $q->where('managed', true)->where(fn (Builder $g) => $g->where('id', 1)->orWhere('id', 2)), 'managed==true;(id==1,id==2)'],
    'AND after OR' => [fn (Builder $q) => $q->where('id', 1)->orWhere('id', 2)->where('managed', true), '(id==1,id==2);managed==true'],
]);

it('sends the sort, page, page size, sections and other parameters', function () {
    $query = builderQueryFor(fn (Builder $q) => $q->orderBy('general.name')->orderByDesc('id')->sections('GENERAL', 'HARDWARE')->withParameter('exception-handling', 'LENIENT'));

    expect($query)->toBe('exception-handling=LENIENT&section=GENERAL&section=HARDWARE&sort=general.name:asc,id:desc&page-size=10');
});

it('takes sections as a list too', function () {
    expect(builderQueryFor(fn (Builder $q) => $q->sections(['general', 'USER_AND_LOCATION'])))->toBe('section=GENERAL&section=USER_AND_LOCATION&page-size=10');
});

it('sends one page for forPage(), counting pages from 1 as Laravel does', function () {
    $mock = FakeJamf::respondWith([ExampleListRequest::class => FakeJamf::page([['id' => '51']], 120)]);

    $records = exampleBuilder()->forPage(2, 50)->get();

    expect($records->first()->id)->toBe('51')
        ->and(FakeJamf::queriesReceived($mock, ExampleListRequest::class))->toBe(['page=1&page-size=50']);
});

it('keeps a limit to Jamf\'s page size limit of 2000', function () {
    $mock = FakeJamf::respondWith([ExampleListRequest::class => FakeJamf::page([])]);

    exampleBuilder()->limit(5000)->get();

    expect(FakeJamf::queriesReceived($mock, ExampleListRequest::class))->toBe(['page-size=2000']);
});

it('gets every matching record, a page at a time, when not told how many', function () {
    config()->set('jamf.pagination.per_page', 2);
    $mock = FakeJamf::respondWith([ExampleListRequest::class => builderPagesOf(5)]);

    $records = exampleBuilder()->where('id', '>', 0)->get();

    expect($records)->toBeInstanceOf(Collection::class)
        ->and($records)->toHaveCount(5)
        ->and($records->every(fn ($record) => $record instanceof ExampleData))->toBeTrue()
        ->and(FakeJamf::queriesReceived($mock, ExampleListRequest::class))->toBe([
            'filter=id>0&page=0&page-size=2',
            'filter=id>0&page=1&page-size=2',
            'filter=id>0&page=2&page-size=2',
        ]);
});

it('gets every record with all(), lazy() and cursor()', function () {
    FakeJamf::respondWith([ExampleListRequest::class => builderPagesOf(3)]);

    expect(exampleBuilder()->all(2))->toHaveCount(3)
        ->and(exampleBuilder()->lazy(2))->toBeInstanceOf(LazyCollection::class)
        ->and(exampleBuilder()->lazy(2)->map(fn (ExampleData $record) => $record->id)->all())->toBe(['1', '2', '3'])
        ->and(exampleBuilder()->cursor(2)->count())->toBe(3);
});

it('gives a paginator over the matching records, paging with the limit when one was set', function () {
    $mock = FakeJamf::respondWith([ExampleListRequest::class => builderPagesOf(3)]);

    $paginator = exampleBuilder()->where('id', '>', 0)->limit(2)->paginate();

    expect($paginator)->toBeInstanceOf(JamfPaginator::class)
        ->and($paginator->collect()->all())->toHaveCount(3)
        ->and(FakeJamf::queriesReceived($mock, ExampleListRequest::class)[0])->toBe('filter=id>0&page=0&page-size=2');
});

it('gets the first record with a page of one', function () {
    $mock = FakeJamf::respondWith([ExampleListRequest::class => FakeJamf::page([['id' => '9', 'name' => 'First']], 40)]);

    $record = exampleBuilder()->orderBy('name')->first();

    expect($record)->toBeInstanceOf(ExampleData::class)
        ->and($record->name)->toBe('First')
        ->and(FakeJamf::queriesReceived($mock, ExampleListRequest::class))->toBe(['sort=name:asc&page=0&page-size=1']);
});

it('gives null for the first of nothing', function () {
    FakeJamf::respondWith([ExampleListRequest::class => FakeJamf::page([], 0)]);

    expect(exampleBuilder()->first())->toBeNull();
});

it('counts the matching records from the total of a page of one', function () {
    $mock = FakeJamf::respondWith([ExampleListRequest::class => FakeJamf::page([['id' => '1']], 2345)]);

    expect(exampleBuilder()->where('managed', true)->count())->toBe(2345)
        ->and(exampleBuilder()->exists())->toBeTrue()
        ->and(FakeJamf::queriesReceived($mock, ExampleListRequest::class)[0])->toBe('filter=managed==true&page=0&page-size=1');
});

it('says nothing exists when the total is nought', function () {
    FakeJamf::respondWith([ExampleListRequest::class => FakeJamf::page([], 0)]);

    expect(exampleBuilder()->exists())->toBeFalse();
});

it('finds a record by id with the collection\'s item request', function () {
    $mock = FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make(['id' => '7', 'name' => 'Lab iPad'])]);

    $record = exampleBuilder()->find(7);

    expect($record)->toBeInstanceOf(ExampleData::class)
        ->and($record->name)->toBe('Lab iPad')
        ->and(FakeJamf::urisReceived($mock, ExampleItemRequest::class))->toBe([FakeJamf::API_URL.'/v1/examples/7']);
});

it('gives null for a record Jamf does not have, and findOrFail() throws', function () {
    FakeJamf::respondWith([ExampleItemRequest::class => FakeJamf::problem(404, 'Mobile device not found', code: 'INVALID_ID')]);

    expect(exampleBuilder()->find(404))->toBeNull();

    exampleBuilder()->findOrFail(404);
})->throws(NotFoundException::class, 'Mobile device not found');

it('gives the record from findOrFail() when Jamf has it', function () {
    FakeJamf::respondWith([ExampleItemRequest::class => MockResponse::make(['id' => '7'])]);

    expect(exampleBuilder()->findOrFail('7')->id)->toBe('7');
});

it('finds a record by filtering on its id when the collection has no item request', function () {
    $mock = FakeJamf::respondWith([ExampleListRequest::class => FakeJamf::page([['id' => '7']], 1)]);
    $paged = new PagedResource(FakeJamf::connector(), ExampleData::class, fn (Query $query) => new ExampleListRequest($query));

    expect($paged->find(7)->id)->toBe('7')
        ->and($paged->findOrFail(7)->id)->toBe('7')
        ->and(FakeJamf::queriesReceived($mock, ExampleListRequest::class)[0])->toBe('filter=id=="7"&page=0&page-size=1');
});

it('throws when filtering on its id finds nothing for findOrFail()', function () {
    FakeJamf::respondWith([ExampleListRequest::class => FakeJamf::page([], 0)]);
    $paged = new PagedResource(FakeJamf::connector(), ExampleData::class, fn (Query $query) => new ExampleListRequest($query));

    expect($paged->find(7))->toBeNull();

    $paged->findOrFail(7);
})->throws(NotFoundException::class);

it('creates, updates and deletes with the collection\'s requests', function () {
    $mock = FakeJamf::respondWith([
        ExampleCreateRequest::class => MockResponse::make(['id' => '12', 'href' => '/v1/examples/12'], 201),
        ExampleUpdateRequest::class => MockResponse::make(['id' => '12', 'name' => 'Renamed']),
        ExampleDeleteRequest::class => MockResponse::make('', 204),
    ]);

    $created = exampleBuilder()->create(['name' => 'New']);
    $updated = exampleBuilder()->update(12, new ExampleData(name: 'Renamed', password: 'secret'));
    $deleted = exampleBuilder()->delete(12);

    expect($created)->toBe(['id' => '12', 'href' => '/v1/examples/12'])
        ->and($updated)->toBeInstanceOf(ExampleData::class)
        ->and($updated->name)->toBe('Renamed')
        ->and($deleted)->toBeTrue()
        ->and(FakeJamf::bodiesReceived($mock, ExampleCreateRequest::class))->toBe(['{"name":"New"}'])
        ->and(FakeJamf::bodiesReceived($mock, ExampleUpdateRequest::class))->toBe(['{"name":"Renamed"}'])
        ->and(FakeJamf::received($mock, ExampleUpdateRequest::class)->getMethod())->toBe(Method::PATCH)
        ->and(FakeJamf::urisReceived($mock, ExampleDeleteRequest::class))->toBe([FakeJamf::API_URL.'/v1/examples/12']);
});

it('refuses what the endpoint does not take, rather than letting Jamf ignore it', function (Closure $build, string $message) {
    FakeJamf::respondWith([]);

    $build(new ExampleReadOnlyResource(FakeJamf::connector()));
})->with([
    'a filter' => [fn (Builder $q) => $q->where('id', 1)->get(), 'takes no filter'],
    'a sort' => [fn (Builder $q) => $q->orderBy('id')->limit(5)->get(), 'takes no sort'],
    'sections' => [fn (Builder $q) => $q->sections('GENERAL')->first(), 'takes no sections'],
    'a filter when paging' => [fn (Builder $q) => $q->where('id', 1)->paginate(), 'takes no filter'],
    'creating' => [fn (Builder $q) => $q->create(['name' => 'x']), 'no way to create'],
    'updating' => [fn (Builder $q) => $q->update(1, ['name' => 'x']), 'no way to update'],
    'deleting' => [fn (Builder $q) => $q->delete(1), 'no way to delete'],
])->throws(LogicException::class);

it('says which endpoint refused', function () {
    (new ExampleReadOnlyResource(FakeJamf::connector()))->where('id', 1)->toRequest();
})->throws(LogicException::class, "Jamf's GET /v1/plain-examples takes no filter.");

it('gives what it would send', function () {
    $builder = exampleBuilder()->where('id', '>', 5)->orderBy('name')->forPage(3, 25);

    expect($builder->toArray())->toBe(['filter' => 'id>5', 'sort' => 'name:asc', 'page' => 2, 'page-size' => 25])
        ->and($builder->toQuery())->toBeInstanceOf(Query::class)
        ->and($builder->toFilter())->toBeInstanceOf(Filter::class)
        ->and((string) $builder->toFilter())->toBe('id>5')
        ->and($builder->toRequest())->toBeInstanceOf(ExampleListRequest::class)
        ->and($builder->toRequest()->query()->all())->toBe(['filter' => 'id>5', 'sort' => 'name:asc', 'page' => 2, 'page-size' => 25]);
});

it('builds a query over a collection the package has no resource for', function () {
    $mock = FakeJamf::respondWith([
        AdhocListRequest::class => FakeJamf::page([['id' => '1', 'name' => 'Thing']], 1),
        AdhocRequest::class => fn (PendingRequest $request) => $request->getMethod() === Method::DELETE ? MockResponse::make('', 204) : MockResponse::make(['id' => '1']),
        AdhocBodyRequest::class => MockResponse::make(['id' => '2']),
    ]);
    $things = FakeJamf::connector()->from('/v1/things');

    expect($things->where('name', 'Thing')->limit(1)->get()->first())->toBe(['id' => '1', 'name' => 'Thing'])
        ->and(FakeJamf::connector()->from('/v1/things')->find(1))->toBe(['id' => '1'])
        ->and(FakeJamf::connector()->from('/v1/things')->create(['name' => 'New']))->toBe(['id' => '2'])
        ->and(FakeJamf::connector()->from('/v1/things')->update(2, ['name' => 'Renamed']))->toBe(['id' => '2'])
        ->and(FakeJamf::connector()->from('/v1/things', Method::PUT)->update(2, ['name' => 'Replaced']))->toBe(['id' => '2'])
        ->and(FakeJamf::connector()->from('/v1/things')->delete(1))->toBeTrue();

    $writes = array_map(fn ($response) => $response->getPendingRequest()->getMethod()->value.' '.$response->getPsrRequest()->getUri()->getPath(), FakeJamf::responsesTo($mock, AdhocBodyRequest::class));
    $others = array_map(fn ($response) => $response->getPendingRequest()->getMethod()->value.' '.$response->getPsrRequest()->getUri()->getPath(), FakeJamf::responsesTo($mock, AdhocRequest::class));

    expect(FakeJamf::queriesReceived($mock, AdhocListRequest::class))->toBe(['filter=name=="Thing"&page-size=1'])
        ->and($writes)->toBe(['POST /api/v1/things', 'PATCH /api/v1/things/2', 'PUT /api/v1/things/2'])
        ->and(array_values(array_filter($others, fn ($line) => ! str_starts_with($line, 'POST') && ! str_starts_with($line, 'PATCH') && ! str_starts_with($line, 'PUT'))))->toBe(['GET /api/v1/things/1', 'DELETE /api/v1/things/1']);
});

it('pages through the inventory of every mobile device with the sections asked for, as models', function () {
    $mock = FakeJamf::respondWith([GetMobileDevicesDetailV2Request::class => builderPagesOf(2500, fn (int $id) => [
        'mobileDeviceId' => (string) $id,
        'deviceType' => 'iOS',
        'general' => ['displayName' => "iPad $id", 'assetTag' => "A$id"],
        'hardware' => ['serialNumber' => "SN$id", 'wifiMacAddress' => 'aa:bb:cc:dd:ee:ff'],
        'userAndLocation' => ['username' => "user$id"],
    ])]);

    $devices = FakeJamf::connector()->mobileDevices()->getMobileDevicesDetailV2()
        ->sections(['GENERAL', 'HARDWARE', 'USER_AND_LOCATION', 'NETWORK'])
        ->lazy(2000)
        ->all();

    expect($devices)->toHaveCount(2500)
        ->and($devices[0])->toBeInstanceOf(MobileDeviceResponse::class)
        ->and($devices[2499]->mobileDeviceId)->toBe('2500')
        ->and($devices[0]->general->assetTag)->toBe('A1')
        ->and($devices[0]->hardware->serialNumber)->toBe('SN1')
        ->and($devices[0]->userAndLocation->username)->toBe('user1')
        ->and(FakeJamf::queriesReceived($mock, GetMobileDevicesDetailV2Request::class))->toBe([
            'section=GENERAL&section=HARDWARE&section=USER_AND_LOCATION&section=NETWORK&page=0&page-size=2000',
            'section=GENERAL&section=HARDWARE&section=USER_AND_LOCATION&section=NETWORK&page=1&page-size=2000',
        ])
        ->and(FakeJamf::urisReceived($mock, GetMobileDevicesDetailV2Request::class)[0])->toStartWith(FakeJamf::API_URL.'/v2/mobile-devices/detail?');
});

it('updates a mobile device with a PATCH to its record', function () {
    $mock = FakeJamf::respondWith([UpdateMobileDeviceV2Request::class => MockResponse::make(['id' => '61', 'assetTag' => 'A1'])]);

    $device = FakeJamf::connector()->mobileDevices()->update(61, ['assetTag' => 'A1']);

    expect($device)->toBeInstanceOf(MobileDeviceDetailsV2::class)
        ->and(FakeJamf::received($mock, UpdateMobileDeviceV2Request::class)->getMethod())->toBe(Method::PATCH)
        ->and(FakeJamf::urisReceived($mock, UpdateMobileDeviceV2Request::class))->toBe([FakeJamf::API_URL.'/v2/mobile-devices/61'])
        ->and(FakeJamf::bodiesReceived($mock, UpdateMobileDeviceV2Request::class))->toBe(['{"assetTag":"A1"}']);
});

it('refuses to filter the list of mobile devices, which Jamf only sorts', function () {
    FakeJamf::connector()->mobileDevices()->where('name', 'x')->get();
})->throws(LogicException::class, "Jamf's GET /v2/mobile-devices takes no filter.");
