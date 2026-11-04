![Banner](https://banners.beyondco.de/Jamf.png?theme=dark&packageManager=composer+require&packageName=spkm%2Fjamf&pattern=architect&style=style_2&description=&md=1&showWatermark=1&fontSize=100px&images=https%3A%2F%2Flaravel.com%2Fimg%2Flogomark.min.svg)

[![Tests](https://github.com/spkm/jamf/actions/workflows/tests.yml/badge.svg?branch=main)](https://github.com/spkm/jamf/actions/workflows/tests.yml?branch=main)
[![Latest version](https://img.shields.io/packagist/v/spkm/jamf)](https://packagist.org/packages/spkm/jamf)
[![PHP version](https://img.shields.io/packagist/php-v/spkm/jamf)](https://packagist.org/packages/spkm/jamf)

A Laravel package for [Jamf Pro](https://www.jamf.com/products/jamf-pro/)'s two APIs, built with
[Saloon](https://docs.saloon.dev). It has a request for every operation in both: all 803 in the Jamf Pro API (`/api`)
and all 446 in the Classic API (`/JSSResource`), as each server's own schema describes them. The Jamf Pro API also has
a typed model for every record it answers with and an Eloquent-style query builder over its lists. Resources are
grouped as Jamf groups the endpoints: `Jamf::mobileDevices()`, `Jamf::computerInventory()`, `Jamf::buildings()` and
126 more for the Jamf Pro API, and `Jamf::classic()->mobileDevices()`, `Jamf::classic()->policies()` and 77 more for
the Classic API.

```php
use spkm\Jamf\Facades\Jamf;

$device = Jamf::mobileDevices()->find(61);                                  // MobileDeviceV2 or null

$iPads = Jamf::mobileDevices()
    ->getMobileDevicesDetailV2()
    ->sections(['GENERAL', 'HARDWARE', 'USER_AND_LOCATION'])
    ->where('hardware.serialNumber', 'DMP*')
    ->orderBy('displayName')
    ->lazy(2000);                                                           // MobileDeviceResponse, 2000 a page

Jamf::mobileDevices()->update(61, ['assetTag' => 'CRAN-1234']);

$policy = Jamf::classic()->policies()->find(12);                           // array
Jamf::classic()->buildings()->create(['name' => 'Library']);               // ['id' => '5']
```

## Requirements

- PHP 8.5
- Laravel 12.39 or higher, or Laravel 13
- A Jamf Pro server, and either an API client (Settings > System > API roles and clients), which Jamf recommends, or a
  Jamf Pro user account. Its roles or privileges decide what it may do; Jamf answers a call they don't allow with 401
  or 403.

## Installation

```bash
composer require spkm/jamf
php artisan jamf:install
```

The install command publishes `config/jamf.php`. Set the server and an API client in `.env`:

```dotenv
JAMF_BASE_URL=https://yourschool.jamfcloud.com
JAMF_CLIENT_ID=your-client-id
JAMF_CLIENT_SECRET=your-client-secret
```

Or a user account instead:

```dotenv
JAMF_BASE_URL=https://yourschool.jamfcloud.com
JAMF_USERNAME=api-user
JAMF_PASSWORD=api-password
```

## Usage

### Two ways to call Jamf

**Resources** give a method for every endpoint in a group, and a builder over the group's main list. They return
models (arrays for the Classic API) and throw a `JamfApiException` when Jamf answers with an error:

```php
$building = Jamf::buildings()->find('3');                                   // Building or null
$count = Jamf::buildings()->where('city', 'Cranleigh')->count();
$detail = Jamf::mobileDevices()->getMobileDeviceDetailV2(61);               // MobileDeviceDetailsGetV2
```

**Requests** are plain Saloon, for when you want the response itself:

```php
use spkm\Jamf\Pro\Requests\MobileDevices\GetMobileDeviceDetailV2Request;

$response = Jamf::send(new GetMobileDeviceDetailV2Request(61));
$response->status();
$response->json();
$response->dto();   // the same model the resource gives; throws JamfApiException for an error
```

`Jamf::get()`, `post()`, `put()`, `patch()` and `delete()` send any Jamf Pro API path, and `Jamf::from('/v1/path')`
gives a builder over a list the package has no resource for, returning arrays. The Classic API has the same through
`Jamf::classic()`. Every resource, request and model is listed in [ENDPOINTS.md](ENDPOINTS.md).

### Resources

Each group of endpoints in Jamf's documentation is a method on the facade, named after the group:
`Jamf::mobileDevices()`, `Jamf::computerInventory()`, `Jamf::computerPrestages()`, `Jamf::packages()`,
`Jamf::scripts()`, and so on. Each resource has a method for every request in its group, named as the request is
(`GetMobileDeviceDetailV2Request` is `getMobileDeviceDetailV2()`) and taking the same arguments: the path's
parameters, then the body for a write, then any query options the endpoint documents as an array.

```php
Jamf::mobileDevices()->getMobileDeviceDetailV2(61);                         // GET /v2/mobile-devices/61/detail
Jamf::mobileDevices()->eraseMobileDeviceV2(61, ['preserveDataPlan' => true]);
Jamf::computerInventory()->updateComputerInventoryDetailV4(42, ['general' => ['assetTag' => 'CRAN-42']]);
Jamf::packages()->uploadPackageV1(7, new SplFileInfo('/path/to/package.pkg'));
Jamf::buildings()->exportBuildingsV1();                                    // the CSV as a string
Jamf::apiRoles()->createApiRolesV1(['displayName' => 'Readers', 'privileges' => ['Read Buildings']]);
```

The version is part of every name, because Jamf keeps several versions of many endpoints side by side and retires
the older ones; an endpoint Jamf has deprecated is marked `@deprecated`, so your editor flags it.

A group whose main path is a list (`/v2/mobile-devices`, `/v1/buildings`, `/v4/computers-inventory`) is also the
builder over that list, using its newest version: `get()`, `find($id)`, `create()`, `update()` and `delete()` go to
the matching endpoints. Every other list in the group is a method returning a builder of its own:

```php
Jamf::buildings()->getBuildingHistoryV1('3')->orderByDesc('date')->limit(10)->get();
Jamf::computerInventory()->getComputersInventoryFilevaultV4()->all();
```

### The query builder

Jamf Pro filters, sorts and pages in the query string, and the builder writes those parameters for you: one RSQL
`filter`, a `sort`, `page` (counting from 0) and `page-size`, and `section` for the inventory endpoints.

```php
Jamf::computerInventory()
    ->sections(['GENERAL', 'HARDWARE', 'USER_AND_LOCATION'])     // section=GENERAL&section=HARDWARE&...
    ->where('general.name', 'LAB-*')                             // general.name=="LAB-*"
    ->where('general.lastContactTime', '>', now()->subMonth())   // ...;general.lastContactTime>"2026-10-04T..."
    ->whereIn('hardware.model', ['MacBook Air', 'iMac'])         // ...;hardware.model=in=("MacBook Air","iMac")
    ->orWhere('general.assetTag', 'CRAN-1')                      // (...),general.assetTag=="CRAN-1"
    ->orderByDesc('general.reportDate')                          // sort=general.reportDate:desc
    ->forPage(2, 100);                                           // page=1&page-size=100
```

| Builder | Jamf |
|---|---|
| `where($field, $value)`, `where($field, '==', $value)` | `field=="value"`; a `*` in the value is a wildcard |
| `where($field, '!=', $value)`, `whereNot($field, $value)` | `field!="value"` |
| `where($field, '>', $value)` and `<`, `>=`, `<=` | `field>value` |
| `whereIn($field, [...])`, `whereNotIn($field, [...])` | `field=in=(...)`, `field=out=(...)` |
| `whereBetween($field, [$from, $to])` | `field>=from;field<=to` |
| `whereContains($field, $text)` | `field=="*text*"` |
| `where(fn ($query) => ...)`, `orWhere(...)` | a group in brackets; conditions are joined with `;` (and) or `,` (or) |
| `orderBy($field)`, `orderByDesc($field)` | `sort=field:asc`, `sort=field:desc` |
| `limit($n)`, `forPage($page, $perPage)` | `page-size`, and `page` from 0 |
| `sections([...])` | `section`, repeated |
| `withParameter($name, $value)` | any other parameter the endpoint documents |

Nested fields take dots (`general.name`, `hardware.serialNumber`), as Jamf's documentation for each endpoint lists
them. A string value is always quoted, with quotes and backslashes escaped, so a value from a form cannot change the
filter's grammar; dates are sent in ISO 8601. An endpoint that doesn't take a filter, a sort or sections refuses one
with a `LogicException` rather than letting Jamf ignore it and answer every record.

`get()` returns the page `limit()` or `forPage()` asked for, or every match when neither was given; `first()`,
`count()` (Jamf's `totalCount`), `exists()`, `find($id)` and `findOrFail($id)` do what they say; `all()` and `lazy()`
page through every match, 100 at a time (`jamf.pagination.per_page`, up to Jamf's 2000), and `paginate()` gives the
paginator itself.

### Models

Every Jamf Pro record is a readonly model with Jamf's own property names and types: `$device->displayName`,
`$device->general->lastInventoryUpdateDate` (a `CarbonImmutable`), `$device->hardware->serialNumber`, and
`$computer->applications` (a `Collection` of models). A record can carry fields its schema doesn't show (a newer
server's), so a model keeps the ones it has no property for in `$extra` and sends them back when it is written.
`toArray()` and `json_encode()` give the record as Jamf would send it, except for its secrets: a property that holds a
password, token, passcode or key is left out, so a model that is logged, cached or returned from a route does not
carry it; `toArray(withHidden: true)` includes them, and `hidden()` names them.

`Model::from($record)` is for records Jamf sent, since it keeps every key; build a model from request input with its
constructor, so only the fields you name are sent.

The Classic API publishes no schema for its records, so they come back as arrays, without the element that wraps
them: `Jamf::classic()->mobileDevices()->find(61)` gives `['general' => [...], 'location' => [...], ...]`, not
`['mobile_device' => [...]]`.

### Writing

The Jamf Pro API takes JSON: `create()`, `update()` and the write methods take an array of Jamf's field names or a
model, and return what Jamf answered (the record, or `{"id", "href"}` for a new one). An endpoint Jamf documents as a
merge patch is sent as one (`application/merge-patch+json`), and an upload as multipart form data from the file's
contents, a stream or an `SplFileInfo`.

The Classic API takes XML. Its write methods take an array, written as XML under the element that names the record's
kind, or the XML itself; Jamf answers with the record's id:

```php
Jamf::classic()->mobileDeviceGroups()->update(4, [
    'name' => 'Year 9 iPads',
    'mobile_devices' => [['id' => 61], ['id' => 62]],      // <mobile_devices><mobile_device><id>61</id>...
]);
Jamf::classic()->policies()->create('<policy><general><name>Install Office</name></general></policy>');
Jamf::classic()->post('/buildings/id/0', ['building' => ['name' => 'Library']]);
```

A list is written as one element per item, named for the singular of the list (`mobile_devices` holds
`mobile_device`), or for the one key an item is given under.

### Errors

A resource method throws a `JamfApiException` for an error status; a request's `dto()` does the same. Its message
carries what Jamf said: the Jamf Pro API's `errors` (with the field each concerns), the token endpoint's
`error_description`, or the Classic API's "Error: ..." line. `errors()` gives the Jamf Pro API's causes, and
`getResponse()` the response.

| Jamf answered | Exception |
|---|---|
| 404 | `NotFoundException` (`find()` returns `null` instead) |
| 401, 403 | `UnauthorizedException` |
| 429 | `RateLimitedException`, with `retryAfter()` |
| 400, 405, 406, 409, 412, 415, 422 | `InvalidRequestException` |
| 408, 5xx, or a success that isn't JSON | `ServerErrorException` |

### Tokens

The package signs in before the first request (building a connector contacts nothing) and keeps the bearer token in
the cache, encrypted, for the Jamf Pro and Classic connectors alike, until a minute before it expires. When Jamf
refuses a token, it fetches a new one and sends the request again, once (`jamf.reauthenticate`). `Jamf::forgetToken()`
drops it. Connectors, and the credentials in them, refuse to be serialised, so they never travel with a queued job;
resolve the facade where you need it.

Jamf's own pages hang off the same address: `Jamf::baseUrl().'/mobileDevices.html?id=61'`.

### Several servers

Add further servers under `connections` in `config/jamf.php` and reach them with `Jamf::connection('name')` (the Jamf
Pro API) and `Jamf::classic('name')`, which give connectors with the same resources and methods as the facade.

### Caching, timeouts and retries

`JAMF_CACHE=true` caches GET responses for records for `jamf.cache.seconds` in `JAMF_CACHE_STORE` (the default cache
store when unset), one entry per server, account and query, so another account never reads what this one fetched.
The records themselves are stored as the cache store keeps them, so use a store the application trusts.
`JAMF_CONNECT_TIMEOUT` and `JAMF_REQUEST_TIMEOUT` are in seconds. `JAMF_RETRIES` retries a GET that failed with a
connection error, 408, 429 or 5xx, with exponential backoff from `jamf.retries.interval_ms`; writes are never retried.

## Testing

```bash
composer test
```

The suite fakes Jamf with Saloon's `MockClient`; nothing reaches a real server. It checks every request against the
method and path Jamf documents, builds every model, and calls every resource method.

## Contributing

Pull requests are welcome. Run `composer format`, `composer analyse` and `composer test` before opening one.

## Security

If you discover a security issue, email hello@spkmitchell.co.uk rather than opening an issue.

## Credits

- [Simon Mitchell](https://github.com/spkm)
- [Saloon](https://docs.saloon.dev)

## Licence

MIT.
