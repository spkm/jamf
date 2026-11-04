<?php

use Saloon\Exceptions\Request\RequestException;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\PendingRequest;
use spkm\Jamf\Exceptions\ServerErrorException;
use spkm\Jamf\JamfPaginator;
use spkm\Jamf\Requests\AdhocListRequest;
use spkm\Jamf\Tests\Fixtures\ExampleData;
use spkm\Jamf\Tests\Fixtures\ExampleListRequest;
use spkm\Jamf\Tests\Helpers\FakeJamf;

/**
 * A faked list of $total records that answers each page by its page and page-size parameters.
 */
function paginatorPages(int $total): Closure
{
    return function (PendingRequest $request) use ($total): MockResponse {
        $page = (int) $request->query()->get('page', 0);
        $size = (int) $request->query()->get('page-size', 100);
        $results = [];

        for ($id = $page * $size + 1; $id <= min($total, ($page + 1) * $size); $id++) {
            $results[] = ['id' => (string) $id, 'name' => "Device $id"];
        }

        return FakeJamf::page($results, $total);
    };
}

it('pages from 0 with the configured page size until it has every record', function () {
    config()->set('jamf.pagination.per_page', 2);
    $mock = FakeJamf::respondWith([ExampleListRequest::class => paginatorPages(5)]);

    $items = FakeJamf::connector()->paginate(new ExampleListRequest)->collect()->all();

    expect(array_column($items, 'id'))->toBe(['1', '2', '3', '4', '5'])
        ->and(FakeJamf::queriesReceived($mock, ExampleListRequest::class))->toBe([
            'page=0&page-size=2',
            'page=1&page-size=2',
            'page=2&page-size=2',
        ]);
});

it('takes the page size it is given over the configured one', function () {
    config()->set('jamf.pagination.per_page', 2);
    $mock = FakeJamf::respondWith([ExampleListRequest::class => paginatorPages(3)]);

    FakeJamf::connector()->paginate(new ExampleListRequest, 10)->collect()->all();

    expect(FakeJamf::queriesReceived($mock, ExampleListRequest::class))->toBe(['page=0&page-size=10']);
});

it('keeps the page size between 1 and Jamf\'s limit of 2000', function (int $asked, int $sent) {
    $mock = FakeJamf::respondWith([ExampleListRequest::class => FakeJamf::page([])]);

    FakeJamf::connector()->paginate(new ExampleListRequest, $asked)->collect()->all();

    expect(FakeJamf::queriesReceived($mock, ExampleListRequest::class))->toBe(["page=0&page-size=$sent"]);
})->with([[5000, 2000], [0, 1], [-3, 1], [2000, 2000]]);

it('stops at a page shorter than the page size, even when the total says there are more', function () {
    $mock = FakeJamf::respondWith([ExampleListRequest::class => FakeJamf::page([['id' => '1']], 500)]);

    $items = FakeJamf::connector()->paginate(new ExampleListRequest, 2)->collect()->all();

    expect($items)->toHaveCount(1)
        ->and(FakeJamf::responsesTo($mock, ExampleListRequest::class))->toHaveCount(1);
});

it('stops at an empty page', function () {
    $mock = FakeJamf::respondWith([ExampleListRequest::class => MockResponse::make(['results' => []])]);

    expect(FakeJamf::connector()->paginate(new ExampleListRequest, 2)->collect()->all())->toBe([])
        ->and(FakeJamf::responsesTo($mock, ExampleListRequest::class))->toHaveCount(1);
});

it('stops once it has as many records as the total, without asking for an empty page', function () {
    $mock = FakeJamf::respondWith([ExampleListRequest::class => paginatorPages(4)]);

    $items = FakeJamf::connector()->paginate(new ExampleListRequest, 2)->collect()->all();

    expect($items)->toHaveCount(4)
        ->and(FakeJamf::responsesTo($mock, ExampleListRequest::class))->toHaveCount(2);
});

it('stops when an endpoint ignores the page and answers the same records again', function () {
    $mock = FakeJamf::respondWith([ExampleListRequest::class => MockResponse::make(['results' => [['id' => '1'], ['id' => '2']]])]);

    $items = FakeJamf::connector()->paginate(new ExampleListRequest, 2)->collect()->all();

    expect(array_column($items, 'id'))->toBe(['1', '2'])
        ->and(FakeJamf::responsesTo($mock, ExampleListRequest::class))->toHaveCount(2);
});

it('gives the records as the request\'s models, or as any model', function () {
    FakeJamf::respondWith([ExampleListRequest::class => paginatorPages(3)]);
    $paginator = FakeJamf::connector()->paginate(new ExampleListRequest, 2);

    $dtos = $paginator->dtos()->all();
    $models = FakeJamf::connector()->paginate(new ExampleListRequest, 2)->models(ExampleData::class)->all();

    expect($dtos)->toHaveCount(3)
        ->and($dtos[2])->toBeInstanceOf(ExampleData::class)
        ->and($dtos[2]->name)->toBe('Device 3')
        ->and($models[0])->toBeInstanceOf(ExampleData::class);
});

it('refuses to give models for a request that has none', function () {
    FakeJamf::respondWith([AdhocListRequest::class => FakeJamf::page([])]);

    FakeJamf::connector()->paginate(new AdhocListRequest('/v1/things'))->dtos();
})->throws(LogicException::class, 'AdhocListRequest has no model');

function paginatorFailingSecondPage(): Closure
{
    return function (PendingRequest $request) {
        return (int) $request->query()->get('page') === 0
            ? FakeJamf::page([['id' => '1'], ['id' => '2']], 10)
            : FakeJamf::problem(500, 'Database unavailable');
    };
}

it('throws when a page fails part way through', function () {
    FakeJamf::respondWith([ExampleListRequest::class => paginatorFailingSecondPage()]);

    try {
        FakeJamf::connector()->paginate(new ExampleListRequest, 2)->collect()->all();
        $this->fail('The failed page was not reported.');
    } catch (RequestException $exception) {
        expect($exception->getResponse()->status())->toBe(500);
    }
});

it('throws Jamf\'s own exception when a page fails part way through', function () {
    FakeJamf::respondWith([ExampleListRequest::class => paginatorFailingSecondPage()]);

    FakeJamf::connector()->paginate(new ExampleListRequest, 2)->collect()->all();
})->throws(ServerErrorException::class, 'Database unavailable');

it('counts the pages from the total Jamf gives', function () {
    FakeJamf::respondWith([ExampleListRequest::class => paginatorPages(5)]);

    $paginator = FakeJamf::connector()->paginate(new ExampleListRequest, 2);

    expect($paginator)->toBeInstanceOf(JamfPaginator::class)
        ->and($paginator->count())->toBe(3);
});

it('pages through a real endpoint with its own query kept', function () {
    $mock = FakeJamf::respondWith([FakeJamf::API_URL.'/v1/buildings*' => paginatorPages(3)]);

    $items = FakeJamf::connector()->paginate(new AdhocListRequest('/v1/buildings', ['sort' => 'name:asc']), 2)->collect()->all();

    expect($items)->toHaveCount(3)
        ->and(FakeJamf::queriesReceived($mock, AdhocListRequest::class))->toBe([
            'sort=name:asc&page=0&page-size=2',
            'sort=name:asc&page=1&page-size=2',
        ]);
});
