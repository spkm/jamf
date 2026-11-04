<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\Jamf\Pro\Data\LapsUserPasswordResponseV2;
use spkm\Jamf\Pro\Data\MobileDeviceHardware;
use spkm\Jamf\Pro\Data\MobileDeviceIosGeneral;
use spkm\Jamf\Pro\Data\MobileDeviceResponse;
use spkm\Jamf\Pro\Data\MobileDeviceUserAndLocation;
use spkm\Jamf\Tests\Fixtures\ExampleChild;
use spkm\Jamf\Tests\Fixtures\ExampleData;
use spkm\Jamf\Tests\Fixtures\ExampleRequiredData;

it('casts Jamf\'s values to the types of the model\'s properties', function () {
    $model = ExampleData::from(['id' => 61, 'name' => 'iPad 1', 'count' => '12', 'ratio' => '1.5', 'managed' => 'true', 'tags' => ['a', 'b']]);

    expect($model->id)->toBe('61')
        ->and($model->name)->toBe('iPad 1')
        ->and($model->count)->toBe(12)
        ->and($model->ratio)->toBe(1.5)
        ->and($model->managed)->toBeTrue()
        ->and($model->tags)->toBe(['a', 'b']);
});

it('leaves out a value that cannot be cast', function () {
    $model = ExampleData::from(['count' => 'many', 'ratio' => 'half', 'managed' => 'perhaps', 'name' => ['not' => 'text'], 'tags' => 'a']);

    expect($model->count)->toBeNull()
        ->and($model->ratio)->toBeNull()
        ->and($model->managed)->toBeNull()
        ->and($model->name)->toBeNull()
        ->and($model->tags)->toBeNull();
});

it('builds nested models and lists of models', function () {
    $model = ExampleData::from(['general' => ['name' => 'Lab', 'size' => '3'], 'children' => [['name' => 'a'], ['name' => 'b', 'size' => 2]]]);

    expect($model->general)->toBeInstanceOf(ExampleChild::class)
        ->and($model->general->size)->toBe(3)
        ->and($model->children)->toBeInstanceOf(Collection::class)
        ->and($model->children)->toHaveCount(2)
        ->and($model->children->every(fn ($child) => $child instanceof ExampleChild))->toBeTrue()
        ->and($model->children[1]->size)->toBe(2);
});

it('reads and writes a field whose name is not a PHP identifier under its alias', function () {
    $model = ExampleData::from(['asset-tag' => 'A123']);

    expect($model->assetTag)->toBe('A123')
        ->and($model->toArray())->toBe(['asset-tag' => 'A123'])
        ->and($model->extra)->toBe([]);
});

it('keeps fields the model has no property for and sends them back at the top level', function () {
    $model = ExampleData::from(['id' => '1', 'newField' => ['x' => 1], 'other' => 'kept']);

    expect($model->extra)->toBe(['newField' => ['x' => 1], 'other' => 'kept'])
        ->and($model->toArray())->toBe(['newField' => ['x' => 1], 'other' => 'kept', 'id' => '1']);
});

it('prefers a declared property to a field of the same name in extra', function () {
    $model = new ExampleData(id: '2', extra: ['id' => '1', 'other' => 'x']);

    expect($model->toArray())->toBe(['id' => '2', 'other' => 'x']);
});

it('leaves secrets out of toArray() and JSON unless asked for them', function () {
    $model = ExampleData::from(['name' => 'admin', 'password' => 'hunter2']);

    expect($model->password)->toBe('hunter2')
        ->and($model->toArray())->toBe(['name' => 'admin'])
        ->and(json_encode($model))->toBe('{"name":"admin"}')
        ->and($model->toArray(true))->toBe(['name' => 'admin', 'password' => 'hunter2'])
        ->and(ExampleData::hidden())->toBe(['password']);
});

it('leaves out what is null', function () {
    expect(ExampleData::from(['id' => '1', 'name' => null])->toArray())->toBe(['id' => '1'])
        ->and(ExampleData::from([])->toArray())->toBe([]);
});

it('reads dates as Jamf writes them and sends them back in ISO 8601 with milliseconds', function (mixed $value, string $expected) {
    $model = ExampleData::from(['lastContact' => $value]);

    expect($model->lastContact)->toBeInstanceOf(CarbonImmutable::class)
        ->and($model->toArray()['lastContact'])->toBe($expected);
})->with([
    'ISO 8601 with milliseconds' => ['2026-02-15T23:03:19.954Z', '2026-02-15T23:03:19.954Z'],
    'ISO 8601 with nanoseconds' => ['2026-02-15T23:03:19.954123456Z', '2026-02-15T23:03:19.954Z'],
    'ISO 8601 with an offset, sent back in UTC' => ['2026-02-15T23:03:19+01:00', '2026-02-15T22:03:19.000Z'],
    'milliseconds' => [1771196599954, '2026-02-15T23:03:19.954Z'],
    'seconds' => [1771196599, '2026-02-15T23:03:19.000Z'],
    'seconds as text' => ['1771196599', '2026-02-15T23:03:19.000Z'],
]);

it('reads no date from zero, an empty string, or something that is not a date', function (mixed $value) {
    expect(ExampleData::from(['lastContact' => $value])->lastContact)->toBeNull();
})->with([[0], [''], ['   '], ['not a date'], [['an' => 'array']]]);

it('builds a collection of models', function () {
    $models = ExampleData::collect([['id' => '1'], ['id' => '2']]);

    expect($models)->toBeInstanceOf(Collection::class)
        ->and($models->pluck('id')->all())->toBe(['1', '2'])
        ->and(ExampleData::collect(null))->toHaveCount(0);
});

it('serialises nested models and lists of models', function () {
    $model = ExampleData::from(['general' => ['name' => 'Lab'], 'children' => [['name' => 'a', 'extraThing' => 1]]]);

    expect($model->toArray())->toBe(['general' => ['name' => 'Lab'], 'children' => [['extraThing' => 1, 'name' => 'a']]]);
});

it('says which value a model cannot be built without', function () {
    ExampleRequiredData::from(['name' => 'x']);
})->throws(InvalidArgumentException::class, 'ExampleRequiredData needs a value for "id".');

it('keeps no extra fields when the model says not to', function () {
    expect(ExampleRequiredData::from(['id' => '1', 'other' => 'x'])->toArray())->toBe(['id' => '1']);
});

it('builds a generated model from a mobile device as Jamf sends it, with typed sections', function () {
    $device = MobileDeviceResponse::from([
        'mobileDeviceId' => '61',
        'deviceType' => 'iOS',
        'hardware' => ['serialNumber' => 'DMPXYZ123', 'wifiMacAddress' => 'aa:bb:cc:dd:ee:ff', 'capacityMb' => 65536, 'model' => 'iPad (9th generation)', 'modelIdentifier' => 'iPad12,1'],
        'userAndLocation' => ['username' => 'pupil1', 'realName' => 'A Pupil', 'emailAddress' => 'pupil1@school.test'],
        'general' => ['displayName' => 'iPad 61', 'assetTag' => 'CS1234', 'osVersion' => '17.5', 'ipAddress' => '10.0.0.5', 'lastInventoryUpdateDate' => '2026-02-15T23:03:19.954Z'],
        'extensionAttributes' => [['definitionId' => '1', 'name' => 'Year', 'values' => ['10']]],
        'futureSection' => ['x' => 1],
    ]);

    expect($device->mobileDeviceId)->toBe('61')
        ->and($device->hardware)->toBeInstanceOf(MobileDeviceHardware::class)
        ->and($device->hardware->serialNumber)->toBe('DMPXYZ123')
        ->and($device->hardware->capacityMb)->toBe(65536)
        ->and($device->userAndLocation)->toBeInstanceOf(MobileDeviceUserAndLocation::class)
        ->and($device->userAndLocation->username)->toBe('pupil1')
        ->and($device->general)->toBeInstanceOf(MobileDeviceIosGeneral::class)
        ->and($device->general->assetTag)->toBe('CS1234')
        ->and($device->extensionAttributes)->toHaveCount(1)
        ->and($device->extra)->toBe(['futureSection' => ['x' => 1]]);
});

it('includes nested models\' secrets when asked for them, and only then', function () {
    $model = LapsUserPasswordResponseV2::from(['lapsUserPasswordList' => [['username' => 'admin', 'password' => 'secret']]]);

    expect($model->toArray())->toBe(['lapsUserPasswordList' => [['username' => 'admin']]])
        ->and($model->toArray(true))->toBe(['lapsUserPasswordList' => [['username' => 'admin', 'password' => 'secret']]])
        ->and(json_encode($model))->not->toContain('secret');
});
