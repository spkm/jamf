<?php

use spkm\Jamf\Classic\Resources\ClassicResource;
use spkm\Jamf\Classic\Resources\HasResources;
use spkm\Jamf\Facades\Jamf;
use spkm\Jamf\Resources\BaseResource;
use spkm\Jamf\Tests\Helpers\FakeJamf;

$endpoints = require __DIR__.'/classic-endpoints.php';
$listed = array_map(fn (array $row) => $row[0], $endpoints);

/**
 * @return list<string>
 */
function classicAccessors(): array
{
    return array_map(fn (ReflectionMethod $method) => $method->getName(), (new ReflectionClass(HasResources::class))->getMethods(ReflectionMethod::IS_PUBLIC));
}

it('gives a resource for every group of Classic API endpoints', function () {
    expect(classicAccessors())->toHaveCount(79);

    $collections = 0;

    foreach (classicAccessors() as $accessor) {
        $resource = FakeJamf::classic()->{$accessor}();
        $collections += $resource instanceof ClassicResource ? 1 : 0;

        expect($resource)->toBeInstanceOf(BaseResource::class);
    }

    expect($collections)->toBeGreaterThan(50);
});

it('reaches every Classic resource through the facade and documents it and each of its methods', function () {
    config()->set('jamf.base_url', 'https://school.jamfcloud.test');
    config()->set('jamf.username', 'api-user');
    config()->set('jamf.password', 'api-password');
    $markdown = file_get_contents(__DIR__.'/../../ENDPOINTS.md');

    foreach (classicAccessors() as $accessor) {
        $resource = Jamf::classic()->{$accessor}();

        expect($markdown)->toContain("Jamf::classic()->{$accessor}()");

        foreach ((new ReflectionClass($resource))->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            if ($method->getDeclaringClass()->getName() === $resource::class && ! $method->isConstructor()) {
                expect($markdown)->toContain('\\'.ucfirst($method->getName()).'Request`');
            }
        }
    }
});

it('uses every Classic API request from some resource', function () use ($listed) {
    $used = [];

    foreach (glob(__DIR__.'/../../src/Classic/Resources/*.php') as $file) {
        preg_match_all('/^use (spkm\\\\Jamf\\\\Classic\\\\Requests\\\\[^;]+);/m', (string) file_get_contents($file), $matches);
        $used = [...$used, ...$matches[1]];
    }

    expect(array_values(array_diff($listed, $used)))->toBe([]);
});
