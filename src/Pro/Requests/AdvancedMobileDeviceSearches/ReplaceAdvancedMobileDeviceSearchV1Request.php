<?php

namespace spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\AdvancedSearch;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Advanced Search object: PUT /v1/advanced-mobile-device-searches/{id}.
 *
 * Gets Specified Advanced Search Object
 */
class ReplaceAdvancedMobileDeviceSearchV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = AdvancedSearch::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/advanced-mobile-device-searches/'.Path::segment((string) $this->id);
    }
}
