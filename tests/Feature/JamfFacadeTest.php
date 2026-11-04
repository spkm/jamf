<?php

use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Facades\Jamf;
use spkm\Jamf\JamfService;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Resources\HasResources;
use spkm\Jamf\Pro\Resources\MobileDevicesResource;
use spkm\Jamf\Tests\Helpers\FakeJamf;

function facadeDocblock(): string
{
    return (string) (new ReflectionClass(Jamf::class))->getDocComment();
}

it('documents every Jamf Pro resource on the facade', function () {
    $accessors = (new ReflectionClass(HasResources::class))->getMethods(ReflectionMethod::IS_PUBLIC);
    $docblock = facadeDocblock();

    foreach ($accessors as $method) {
        $returns = $method->getReturnType();

        expect($returns)->toBeInstanceOf(ReflectionNamedType::class)
            ->and($docblock)->toContain('@method static \\'.$returns->getName().' '.$method->getName().'()');
    }

    preg_match_all('/@method static \\\\spkm\\\\Jamf\\\\Pro\\\\Resources\\\\/', $docblock, $documented);

    expect($accessors)->toHaveCount(129)
        ->and($documented[0])->toHaveCount(count($accessors));
});

it('documents the connector\'s own calls on the facade, each of which exists', function () {
    $docblock = facadeDocblock();

    foreach (['pro', 'classic', 'connection', 'send', 'paginate', 'from', 'get', 'post', 'put', 'patch', 'delete', 'baseUrl', 'forgetToken'] as $name) {
        expect($docblock)->toMatch('/@method static \S+ '.$name.'\(/');
    }

    preg_match_all('/@method static .*? (\w+)\(/', $docblock, $methods);

    foreach ($methods[1] as $name) {
        expect(method_exists(JamfService::class, $name) || method_exists(ProConnector::class, $name))->toBeTrue("Jamf::$name() is documented but does not exist");
    }
});

it('reaches the default server\'s resources and Classic API through the facade', function () {
    config()->set('jamf.base_url', FakeJamf::BASE_URL.'/');
    config()->set('jamf.username', 'api-user');
    config()->set('jamf.password', 'api-password');

    expect(Jamf::mobileDevices())->toBeInstanceOf(MobileDevicesResource::class)
        ->and(Jamf::mobileDevices()->connector())->toBe(Jamf::pro())
        ->and(Jamf::classic())->toBeInstanceOf(ClassicConnector::class)
        ->and(Jamf::classic()->mobileDevices()->connector())->toBe(Jamf::classic())
        ->and(Jamf::baseUrl())->toBe(FakeJamf::BASE_URL)
        ->and(Jamf::baseUrl().'/mobileDevices.html?id=61')->toBe('https://school.jamfcloud.test/mobileDevices.html?id=61');
});
