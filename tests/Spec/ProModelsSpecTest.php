<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\AuthTokenV1;

$models = collect(glob(__DIR__.'/../../src/Pro/Data/*.php'))
    ->map(fn (string $file) => 'spkm\\Jamf\\Pro\\Data\\'.basename($file, '.php'))
    ->mapWithKeys(fn (string $class) => [class_basename($class) => [$class]])
    ->all();

it('builds every model from Jamf\'s values and serialises it back', function (string $class) {
    $attributes = [];
    $expected = [];
    $reflection = new ReflectionClass($class);
    $aliases = $reflection->getConstant('ALIASES') ?: [];
    $dateFormat = $reflection->getConstant('DATE_FORMAT');

    foreach ($reflection->getConstructor()->getParameters() as $parameter) {
        $type = $parameter->getType();
        $name = $parameter->getName();
        $key = $aliases[$name] ?? $name;

        expect($type)->toBeInstanceOf(ReflectionNamedType::class)
            ->and($parameter->isDefaultValueAvailable())->toBeTrue()
            ->and($name)->toMatch('/^[A-Za-z_]\w*$/');

        if ($name === 'extra') {
            continue;
        }

        [$attributes[$key], $expected[$key]] = match ($type->getName()) {
            'int' => ['12', 12],
            'float' => ['1.5', 1.5],
            'bool' => ['true', true],
            'string' => [7, '7'],
            'array' => [['a' => 1], ['a' => 1]],
            'mixed' => ['x', 'x'],
            CarbonImmutable::class => ['2026-01-01T00:00:00.000Z', CarbonImmutable::parse('2026-01-01T00:00:00.000Z')->format($dateFormat)],
            Collection::class => [[[]], [[]]],
            default => is_subclass_of($type->getName(), Data::class) ? [[], []] : throw new LogicException("$class::$name has an unexpected type"),
        };
    }

    $model = $class::from([...$attributes, 'undocumented' => 'kept']);
    $hidden = $class::hidden();

    expect($model)->toBeInstanceOf(Data::class)
        ->and($model->toArray())->toBe(['undocumented' => 'kept', ...array_diff_key($expected, array_flip(array_map(fn (string $name) => $aliases[$name] ?? $name, $hidden)))])
        ->and($model->toArray(true))->toBe(['undocumented' => 'kept', ...$expected])
        ->and($model->extra)->toBe(['undocumented' => 'kept'])
        ->and($class::from([]))->toBeInstanceOf($class)
        ->and($class::from([])->toArray())->toBe([]);
})->with($models);

it('returns a model from every request that names one, for a record or a list', function () use ($models) {
    $classes = array_map(fn (array $row) => $row[0], $models);

    foreach (require __DIR__.'/pro-endpoints.php' as $name => [, , , , $shape, $dto]) {
        if ($dto !== null) {
            expect(in_array($dto, $classes, true))->toBeTrue("$name returns $dto, which is not a model")
                ->and(in_array($shape, ['one', 'list'], true))->toBeTrue("$name names a model for a $shape response");
        }
    }

    expect(count($models))->toBeGreaterThan(400);
});

it('keeps secrets out of what a model serialises', function () {
    $token = AuthTokenV1::from(['token' => 'secret-token', 'expires' => '2026-01-01T00:00:00.000Z']);

    expect($token->token)->toBe('secret-token')
        ->and($token->toArray())->not->toHaveKey('token')
        ->and(json_encode($token))->not->toContain('secret-token');
});
