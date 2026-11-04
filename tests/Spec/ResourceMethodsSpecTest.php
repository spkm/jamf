<?php

use Illuminate\Support\Collection;
use Saloon\Http\Faking\MockResponse;
use spkm\Jamf\Classic\Resources\ClassicResource;
use spkm\Jamf\Classic\Resources\HasResources as ClassicResources;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Resources\HasResources as ProResources;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Resources\BaseResource;
use spkm\Jamf\Resources\PagedResource;
use spkm\Jamf\Tests\Helpers\FakeJamf;

/*
 * Every method a generated resource offers, called once against a faked Jamf that answers everything with one
 * record: each must send a request and give back what its return type promises.
 */

function resourceArgument(ReflectionParameter $parameter): mixed
{
    $type = $parameter->getType();
    $name = $type instanceof ReflectionNamedType ? $type->getName() : (string) $type;

    return match (true) {
        $name === 'int' => 7,
        $name === 'string' => 'sample',
        $name === 'bool' => true,
        str_contains($name, 'array') => [],
        str_contains($name, 'Query') => Query::make(),
        $parameter->isDefaultValueAvailable() => $parameter->getDefaultValue(),
        default => 'sample',
    };
}

function checkResourceReturn(ReflectionMethod $method, mixed $result): void
{
    $type = $method->getReturnType();
    $name = $type instanceof ReflectionNamedType ? $type->getName() : 'mixed';

    match (true) {
        $name === 'bool' => expect($result)->toBeTrue(),
        $name === Collection::class => expect($result)->toBeInstanceOf(Collection::class),
        $name === 'string' => expect($result)->toBeString(),
        is_subclass_of($name, Data::class) => expect($result)->toBeInstanceOf($name),
        $name === PagedResource::class => expect($result)->toBeInstanceOf(PagedResource::class),
        default => expect(true)->toBeTrue(),
    };
}

/**
 * Call every method a resource declares (and, for a builder or Classic collection, what it inherits), counting
 * the calls.
 */
function exerciseResource(BaseResource $resource): int
{
    $calls = 0;

    foreach ((new ReflectionClass($resource))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
        if ($method->getDeclaringClass()->getName() !== $resource::class || $method->isConstructor()) {
            continue;
        }

        $result = $resource->{$method->getName()}(...array_map(resourceArgument(...), $method->getParameters()));
        checkResourceReturn($method, $result);
        $calls++;

        if ($result instanceof Builder) {
            expect($result->limit(1)->get())->toBeInstanceOf(Collection::class)
                ->and($result->count())->toBe(1);
            $calls += 2;
        }
    }

    if ($resource instanceof Builder) {
        expect($resource->limit(1)->get())->toBeInstanceOf(Collection::class)
            ->and($resource->first())->toBeInstanceOf(Data::class)
            ->and($resource->count())->toBe(1);

        foreach (['find' => [7], 'create' => [[]], 'update' => [7, []], 'delete' => [7]] as $action => $arguments) {
            try {
                $resource->{$action}(...$arguments);
                $calls++;
            } catch (LogicException $exception) {
                expect($exception->getMessage())->toContain('Jamf');
            }
        }
    }

    if ($resource instanceof ClassicResource) {
        expect($resource->get())->toBeInstanceOf(Collection::class)
            ->and($resource->count())->toBe(1);

        foreach (['find' => [7], 'create' => [['name' => 'x']], 'update' => [7, ['name' => 'x']], 'delete' => [7]] as $action => $arguments) {
            try {
                $resource->{$action}(...$arguments);
                $calls++;
            } catch (LogicException $exception) {
                expect($exception->getMessage())->toContain("no way to $action");
            }
        }
    }

    return $calls;
}

$pro = array_map(fn (ReflectionMethod $method) => [$method->getName()], (new ReflectionClass(ProResources::class))->getMethods(ReflectionMethod::IS_PUBLIC));
$classic = array_map(fn (ReflectionMethod $method) => [$method->getName()], (new ReflectionClass(ClassicResources::class))->getMethods(ReflectionMethod::IS_PUBLIC));

it('answers every method of every Jamf Pro resource', function (string $accessor) {
    $mockClient = FakeJamf::respondWith([FakeJamf::API_URL.'/*' => MockResponse::make(['totalCount' => 1, 'results' => [['id' => '7', 'name' => 'x']], 'id' => '7', 'name' => 'x'])]);

    expect(exerciseResource(FakeJamf::connector()->{$accessor}()))->toBeGreaterThan(0)
        ->and($mockClient->getRecordedResponses())->not->toBeEmpty();
})->with($pro);

it('answers every method of every Classic API resource', function (string $accessor) {
    $mockClient = FakeJamf::respondWith([FakeJamf::CLASSIC_URL.'/*' => MockResponse::make(['things' => [['id' => 7, 'name' => 'x']]])]);

    expect(exerciseResource(FakeJamf::classic()->{$accessor}()))->toBeGreaterThan(0)
        ->and($mockClient->getRecordedResponses())->not->toBeEmpty();
})->with($classic);
