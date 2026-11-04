<?php

namespace spkm\Jamf\Pro\Requests\VolumePurchasingLocations;

use JsonSerializable;
use spkm\Jamf\Pro\Data\VolumePurchasingLocation;
use spkm\Jamf\Requests\MergePatchRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a Volume Purchasing Location: PATCH /v1/volume-purchasing-locations/{id}.
 *
 * Updates a Volume Purchasing Location
 */
class UpdateVolumePurchasingLocationV1Request extends MergePatchRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = VolumePurchasingLocation::class;

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
        return '/v1/volume-purchasing-locations/'.Path::segment((string) $this->id);
    }
}
