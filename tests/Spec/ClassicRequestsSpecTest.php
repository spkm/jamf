<?php

use Illuminate\Support\Collection;
use Saloon\Contracts\Body\HasBody;
use Saloon\Http\Faking\MockResponse;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Tests\Helpers\FakeJamf;

$endpoints = require __DIR__.'/classic-endpoints.php';

it('sends the method and path the Classic API documents, and unwraps the response', function (string $class, array $args, string $method, string $path, string $shape, ?string $dto, bool $hasBody, bool $paginatable) {
    /** @var ClassicRequest $request */
    $request = new $class(...$args);

    expect($request)->toBeInstanceOf(ClassicRequest::class)
        ->and($request->getMethod()->value)->toBe($method)
        ->and($request->resolveEndpoint())->toBe($path)
        ->and($request->dtoClass())->toBeNull()
        ->and($request->responseShape())->toBe($shape)
        ->and($request->unwraps())->toBeTrue()
        ->and($request instanceof Paginatable)->toBeFalse()
        ->and($request instanceof HasBody)->toBe($hasBody)
        ->and($request->isSafe())->toBe($method === 'GET');

    $sample = ['id' => 7, 'name' => 'x'];
    FakeJamf::respondWith([$class => match (true) {
        $shape === 'list' => MockResponse::make(['things' => [$sample]]),
        $shape === 'one' && $method === 'GET' => MockResponse::make(['thing' => $sample]),
        $shape === 'one' => MockResponse::make('<?xml version="1.0" encoding="UTF-8"?><thing><id>7</id></thing>', 201, ['Content-Type' => 'text/xml;charset=UTF-8']),
        default => MockResponse::make('<?xml version="1.0" encoding="UTF-8"?><thing><id>7</id></thing>', 200, ['Content-Type' => 'text/xml;charset=UTF-8']),
    }]);
    $response = FakeJamf::classic()->send($request);
    $result = $response->dto();

    expect((string) $response->getPsrRequest()->getUri())->toStartWith(FakeJamf::CLASSIC_URL.$path)
        ->and($response->getPsrRequest()->getHeaderLine('Accept'))->toBe('application/json');

    match (true) {
        $shape === 'list' => expect($result)->toBeInstanceOf(Collection::class)->toHaveCount(1)->and($result->first())->toBe($sample),
        $shape === 'one' && $method === 'GET' => expect($result)->toBe($sample),
        $shape === 'one' => expect($result)->toBe(['id' => '7']),
        default => expect($result)->toBeNull(),
    };
})->with($endpoints);

it('lists every Classic API request class once', function () use ($endpoints) {
    $classes = collect(glob(__DIR__.'/../../src/Classic/Requests/*/*Request.php'))
        ->map(fn (string $file) => 'spkm\\Jamf\\Classic\\Requests\\'.basename(dirname($file)).'\\'.basename($file, '.php'))
        ->sort()
        ->values();
    $listed = collect($endpoints)->map(fn (array $row) => $row[0])->sort()->values();

    expect($listed->all())->toBe($classes->all())
        ->and($listed->unique())->toHaveCount($listed->count())
        ->and($classes)->toHaveCount(446);
});

it('documents every Classic API request in ENDPOINTS.md', function () use ($endpoints) {
    $markdown = file_get_contents(__DIR__.'/../../ENDPOINTS.md');

    foreach ($endpoints as $row) {
        expect($markdown)->toContain('`'.str_replace('spkm\\Jamf\\Classic\\Requests\\', '', $row[0]).'`');
    }
});

it('resolves every documented Classic API method and path once', function () use ($endpoints) {
    $operations = collect($endpoints)->map(fn (array $row) => $row[2].' '.$row[3]);

    expect($operations->unique())->toHaveCount($operations->count());
});
