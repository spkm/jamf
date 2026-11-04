<?php

use spkm\Jamf\Facades\Jamf;
use spkm\Jamf\Pro\Resources\HasResources;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Resources\BaseResource;
use spkm\Jamf\Tests\Helpers\FakeJamf;

$endpoints = require __DIR__.'/pro-endpoints.php';
$listed = array_map(fn (array $row) => $row[0], $endpoints);

/**
 * @return list<string>
 */
function proAccessors(): array
{
    return array_map(fn (ReflectionMethod $method) => $method->getName(), (new ReflectionClass(HasResources::class))->getMethods(ReflectionMethod::IS_PUBLIC));
}

it('gives a resource for every group of Jamf Pro endpoints', function () {
    expect(proAccessors())->toHaveCount(129);

    foreach (proAccessors() as $accessor) {
        expect(FakeJamf::connector()->{$accessor}())->toBeInstanceOf(BaseResource::class);
    }
});

it('lists a collection resource with a listed request', function () use ($listed) {
    $builders = 0;

    foreach (proAccessors() as $accessor) {
        $resource = FakeJamf::connector()->{$accessor}();

        if ($resource instanceof Builder) {
            $builders++;
            expect(in_array($resource->toRequest()::class, $listed, true))->toBeTrue("$accessor() lists with an unlisted request");
        }
    }

    expect($builders)->toBeGreaterThan(50);
});

it('reaches every resource through the facade and documents it and each of its methods', function () {
    config()->set('jamf.base_url', 'https://school.jamfcloud.test');
    config()->set('jamf.client_id', 'client-id');
    config()->set('jamf.client_secret', 'client-secret');
    $markdown = file_get_contents(__DIR__.'/../../ENDPOINTS.md');

    foreach (proAccessors() as $accessor) {
        $resource = Jamf::{$accessor}();

        expect($resource)->toBeInstanceOf(FakeJamf::connector()->{$accessor}()::class)
            ->and($markdown)->toContain("Jamf::{$accessor}()");

        foreach ((new ReflectionClass($resource))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() === $resource::class && ! $method->isConstructor()) {
                expect($markdown)->toContain('\\'.ucfirst($method->getName()).'Request`');
            }
        }
    }
});

it('uses every Jamf Pro request from some resource', function () use ($listed) {
    $used = [];

    foreach (glob(__DIR__.'/../../src/Pro/Resources/*.php') as $file) {
        preg_match_all('/^use (spkm\\\\Jamf\\\\Pro\\\\Requests\\\\[^;]+);/m', (string) file_get_contents($file), $matches);
        $used = [...$used, ...$matches[1]];
    }

    expect(array_values(array_diff($listed, $used)))->toBe([]);
});
