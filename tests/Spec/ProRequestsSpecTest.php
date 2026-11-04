<?php

use Illuminate\Support\Collection;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Faking\MockResponse;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Tests\Helpers\FakeJamf;

$endpoints = require __DIR__.'/pro-endpoints.php';

it('sends the method and path the Jamf Pro API documents, and maps the response', function (string $class, array $args, string $method, string $path, string $shape, ?string $dto, bool $hasBody, bool $paginatable) {
    /** @var JamfRequest $request */
    $request = new $class(...$args);

    expect($request)->toBeInstanceOf(JamfRequest::class)
        ->and($request->getMethod()->value)->toBe($method)
        ->and($request->resolveEndpoint())->toBe($path)
        ->and($request->dtoClass())->toBe($dto)
        ->and($request->responseShape())->toBe($shape)
        ->and($request instanceof Paginatable)->toBe($paginatable)
        ->and($request instanceof HasBody)->toBe($hasBody)
        ->and($request->isSafe())->toBe($method === 'GET');

    $sample = ['id' => '7', 'name' => 'x'];
    $mockClient = FakeJamf::respondWith([$class => match ($shape) {
        'list' => FakeJamf::page([$sample]),
        'one' => MockResponse::make($sample),
        'raw' => MockResponse::make(['a' => 'b']),
        'text' => MockResponse::make('serial,name', 200, ['Content-Type' => 'text/csv']),
        default => MockResponse::make('', 204),
    }]);
    $response = FakeJamf::connector()->send($request);
    $result = $response->dto();

    expect((string) $response->getPsrRequest()->getUri())->toStartWith(FakeJamf::API_URL.$path)
        ->and($mockClient->getRecordedResponses())->not->toBeEmpty();

    match ($shape) {
        'list' => $dto === null
            ? expect($result)->toBeInstanceOf(Collection::class)->toHaveCount(1)->and($result->first())->toBe($sample)
            : expect($result)->toBeInstanceOf(Collection::class)->toHaveCount(1)->and($result->first())->toBeInstanceOf($dto),
        'one' => $dto === null ? expect($result)->toBe($sample) : expect($result)->toBeInstanceOf($dto)->and($result)->toBeInstanceOf(Data::class),
        'raw' => expect($result)->toBe(['a' => 'b']),
        'text' => expect($result)->toBe('serial,name'),
        default => expect($result)->toBeNull(),
    };
})->with($endpoints);

it('lists every Jamf Pro request class once', function () use ($endpoints) {
    $classes = collect(glob(__DIR__.'/../../src/Pro/Requests/*/*Request.php'))
        ->map(fn (string $file) => 'spkm\\Jamf\\Pro\\Requests\\'.basename(dirname($file)).'\\'.basename($file, '.php'))
        ->sort()
        ->values();
    $listed = collect($endpoints)->map(fn (array $row) => $row[0])->sort()->values();

    expect($listed->all())->toBe($classes->all())
        ->and($listed->unique())->toHaveCount($listed->count())
        ->and($classes)->toHaveCount(803)
        ->and(collect($endpoints)->keys()->unique())->toHaveCount(count($endpoints));
});

it('documents every Jamf Pro request in ENDPOINTS.md', function () use ($endpoints) {
    $markdown = file_get_contents(__DIR__.'/../../ENDPOINTS.md');

    foreach ($endpoints as $row) {
        expect($markdown)->toContain('`'.str_replace('spkm\\Jamf\\Pro\\Requests\\', '', $row[0]).'`');
    }
});

it('resolves every documented Jamf Pro method and path once', function () use ($endpoints) {
    $operations = collect($endpoints)->map(fn (array $row) => $row[2].' '.$row[3]);

    expect($operations->unique())->toHaveCount($operations->count());
});
