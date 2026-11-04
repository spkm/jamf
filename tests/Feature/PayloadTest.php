<?php

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use spkm\Jamf\Requests\AdhocRequest;
use spkm\Jamf\Support\Payload;
use spkm\Jamf\Support\QueryString;
use spkm\Jamf\Support\Xml;
use spkm\Jamf\Tests\Fixtures\ExampleData;
use spkm\Jamf\Tests\Helpers\FakeJamf;

enum ExamplePayloadKind: string
{
    case Ipad = 'iPad';
}

/**
 * A response from a faked Jamf with the given body and headers.
 *
 * @param  array<mixed>|string  $body
 * @param  array<string, string>  $headers
 */
function payloadResponse(array|string $body, array $headers = []): Response
{
    return FakeJamf::send(new AdhocRequest(Method::GET, '/v1/anything'), $body, 200, $headers);
}

it('decodes JSON, gives null for an empty body, and throws for neither JSON nor XML', function () {
    expect(Payload::json(payloadResponse(['id' => '1'])))->toBe(['id' => '1'])
        ->and(Payload::json(payloadResponse('')))->toBeNull()
        ->and(Payload::json(payloadResponse("  \n")))->toBeNull();

    Payload::json(payloadResponse('not json'));
})->throws(JsonException::class);

it('reads an XML answer as an array without its outer element', function () {
    $response = payloadResponse('<?xml version="1.0" encoding="UTF-8"?><mobile_device><id>42</id></mobile_device>', ['Content-Type' => 'text/xml;charset=UTF-8']);

    expect(Payload::json($response))->toBe(['id' => '42']);
});

it('takes off the key that names a Classic answer\'s kind, and only that', function () {
    expect(Payload::unwrap(['mobile_device' => ['id' => 1]]))->toBe(['id' => 1])
        ->and(Payload::unwrap(['mobile_devices' => [['id' => 1], ['id' => 2]]]))->toBe([['id' => 1], ['id' => 2]])
        ->and(Payload::unwrap(['id' => 1]))->toBe(['id' => 1])
        ->and(Payload::unwrap(['id' => 1, 'name' => 'x']))->toBe(['id' => 1, 'name' => 'x'])
        ->and(Payload::unwrap([['id' => 1]]))->toBe([['id' => 1]])
        ->and(Payload::unwrap('text'))->toBe('text')
        ->and(Payload::json(payloadResponse(['building' => ['id' => 3]]), unwrap: true))->toBe(['id' => 3]);
});

it('finds the records in a page, a list, or an answer that is one record', function () {
    expect(Payload::records(payloadResponse(['totalCount' => 2, 'results' => [['id' => '1'], ['id' => '2']]])))->toBe([['id' => '1'], ['id' => '2']])
        ->and(Payload::records(payloadResponse([['id' => '1']])))->toBe([['id' => '1']])
        ->and(Payload::records(payloadResponse(['id' => '1'])))->toBe([['id' => '1']])
        ->and(Payload::records(payloadResponse([])))->toBe([])
        ->and(Payload::records(payloadResponse('')))->toBe([])
        ->and(Payload::records(payloadResponse(['buildings' => [['id' => 1]]]), unwrap: true))->toBe([['id' => 1]]);
});

it('wraps a list of plain values so every record is an array', function () {
    expect(Payload::records(payloadResponse(['a', 'b'])))->toBe([['value' => 'a'], ['value' => 'b']]);
});

it('gives the records as models, or as arrays without a model', function () {
    $response = payloadResponse(['totalCount' => 1, 'results' => [['id' => '1', 'name' => 'iPad']]]);

    $models = Payload::items($response, ExampleData::class);
    $arrays = Payload::items($response, null);

    expect($models)->toBeInstanceOf(Collection::class)
        ->and($models->first())->toBeInstanceOf(ExampleData::class)
        ->and($models->first()->name)->toBe('iPad')
        ->and($arrays->all())->toBe([['id' => '1', 'name' => 'iPad']]);
});

it('gives one record, the first of a list or page, or null', function () {
    expect(Payload::object(payloadResponse(['id' => '1']), null))->toBe(['id' => '1'])
        ->and(Payload::object(payloadResponse([['id' => '1'], ['id' => '2']]), null))->toBe(['id' => '1'])
        ->and(Payload::object(payloadResponse(['totalCount' => 1, 'results' => [['id' => '9']]]), ExampleData::class)->id)->toBe('9')
        ->and(Payload::object(payloadResponse(['totalCount' => 0, 'results' => []]), null))->toBeNull()
        ->and(Payload::object(payloadResponse(''), ExampleData::class))->toBeNull()
        ->and(Payload::object(payloadResponse(['mobile_device' => ['id' => 4]]), null, unwrap: true))->toBe(['id' => 4]);
});

it('reads the total from a page, and null when an answer has none', function () {
    expect(Payload::total(payloadResponse(['totalCount' => 2500, 'results' => []])))->toBe(2500)
        ->and(Payload::total(payloadResponse(['totalCount' => '12', 'results' => []])))->toBe(12)
        ->and(Payload::total(payloadResponse([['id' => 1]])))->toBeNull()
        ->and(Payload::total(payloadResponse('')))->toBeNull();
});

it('knows XML by its content type, or by its declaration when the type says nothing', function () {
    expect(Xml::isXml(payloadResponse('<a/>', ['Content-Type' => 'application/xml'])))->toBeTrue()
        ->and(Xml::isXml(payloadResponse('<a/>', ['Content-Type' => 'text/xml'])))->toBeTrue()
        ->and(Xml::isXml(payloadResponse('<?xml version="1.0"?><a/>', ['Content-Type' => ''])))->toBeTrue()
        ->and(Xml::isXml(payloadResponse('<?xml version="1.0"?><a/>', ['Content-Type' => 'application/json'])))->toBeFalse()
        ->and(Xml::isXml(payloadResponse(['id' => 1])))->toBeFalse();
});

it('reads repeated elements as a list and nested ones as arrays', function () {
    $xml = '<mobile_device_group><id>5</id><name>Lab</name><mobile_devices><mobile_device><id>1</id></mobile_device><mobile_device><id>2</id></mobile_device></mobile_devices><site><id>-1</id><name>None</name></site></mobile_device_group>';

    expect(Xml::toArray($xml))->toBe([
        'id' => '5',
        'name' => 'Lab',
        'mobile_devices' => ['mobile_device' => [['id' => '1'], ['id' => '2']]],
        'site' => ['id' => '-1', 'name' => 'None'],
    ]);
});

it('reads an element with nothing in it as text', function () {
    expect(Xml::toArray('<value>42</value>'))->toBe(['value' => '42']);
});

it('refuses an answer that is not XML', function () {
    Xml::toArray('<unclosed>');
})->throws(JsonException::class);

it('writes a record as XML under the element naming its kind', function () {
    $xml = Xml::fromArray('mobile_device', [
        'general' => ['name' => 'iPad 1', 'asset_tag' => 'A&B <1>'],
        'managed' => true,
        'supervised' => false,
        'site' => null,
        'last_inventory' => CarbonImmutable::parse('2026-01-02 03:04:05'),
        'kind' => ExamplePayloadKind::Ipad,
        'count' => 3,
    ]);

    expect($xml)->toBe('<mobile_device><general><name>iPad 1</name><asset_tag>A&amp;B &lt;1&gt;</asset_tag></general><managed>true</managed><supervised>false</supervised><site/><last_inventory>2026-01-02 03:04:05</last_inventory><kind>iPad</kind><count>3</count></mobile_device>');
});

it('writes a list as an element per item named for its singular, or for the key an item is given under', function () {
    expect(Xml::fromArray('mobile_device_group', ['mobile_devices' => [['id' => 1], ['id' => 2]]]))
        ->toBe('<mobile_device_group><mobile_devices><mobile_device><id>1</id></mobile_device><mobile_device><id>2</id></mobile_device></mobile_devices></mobile_device_group>')
        ->and(Xml::fromArray('policy', ['scope' => ['computers' => [['computer' => ['id' => 7]]]]]))
        ->toBe('<policy><scope><computers><computer><id>7</id></computer></computers></scope></policy>')
        ->and(Xml::fromArray('category', ['categories' => ['a', 'b']]))
        ->toBe('<category><categories><category>a</category><category>b</category></categories></category>');
});

it('refuses an element name XML does not allow and a value it cannot write', function (Closure $write) {
    $write();
})->with([
    'a bad root' => [fn () => Xml::fromArray('mobile device', ['id' => 1])],
    'a bad field' => [fn () => Xml::fromArray('mobile_device', ['1st' => 1])],
    'an object' => [fn () => Xml::fromArray('mobile_device', ['thing' => new stdClass])],
])->throws(InvalidArgumentException::class);

it('writes a record in the shape the Classic API reads it as JSON', function () {
    $record = ['general' => ['name' => 'iPad 1'], 'mobile_devices' => [['id' => '1'], ['id' => '2']]];

    expect(Xml::toArray(Xml::fromArray('mobile_device_group', $record)))
        ->toBe(['general' => ['name' => 'iPad 1'], 'mobile_devices' => ['mobile_device' => [['id' => '1'], ['id' => '2']]]]);
});

it('writes back a record in the shape it reads XML as', function () {
    $record = ['general' => ['name' => 'iPad 1'], 'mobile_devices' => ['mobile_device' => [['id' => '1'], ['id' => '2']]]];

    expect(Xml::toArray(Xml::fromArray('mobile_device_group', $record)))->toBe($record);
});

it('writes a query string as Jamf reads it', function () {
    expect(QueryString::encode([
        'section' => ['GENERAL', 'HARDWARE'],
        'enabled' => true,
        'disabled' => false,
        'skip' => null,
        'filter' => 'general.name=="a b"',
        'after' => CarbonImmutable::parse('2026-01-02T03:04:05+00:00'),
        'kind' => ExamplePayloadKind::Ipad,
    ]))->toBe('section=GENERAL&section=HARDWARE&enabled=true&disabled=false&filter=general.name%3D%3D%22a%20b%22&after=2026-01-02T03%3A04%3A05%2B00%3A00&kind=iPad');
});

it('writes a nested map in PHP\'s own form, as Jamf has no other', function () {
    expect(urldecode(QueryString::encode(['options' => ['a' => 1, 'b' => 2]])))->toBe('options=a=1&b=2');
});

it('reads a query string back, keeping repeated keys and the = inside a value', function () {
    $parameters = ['section' => ['GENERAL', 'HARDWARE'], 'filter' => 'id==5', 'page' => '0'];

    expect(QueryString::parse(QueryString::encode($parameters)))->toBe($parameters)
        ->and(QueryString::parse(''))->toBe([])
        ->and(QueryString::parse('a&b=1&a=2&a=3'))->toBe(['a' => ['', '2', '3'], 'b' => '1']);
});
