<?php

namespace spkm\Jamf\Pro\Requests\VolumePurchasingLocations;

use spkm\Jamf\Pro\Data\VolumePurchasingLocation;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a Volume Purchasing Location with the supplied id: GET /v1/volume-purchasing-locations/{id}.
 *
 * Retrieves a Volume Purchasing Location with the supplied id
 */
class GetVolumePurchasingLocationV1Request extends GetRequest
{
    protected ?string $dto = VolumePurchasingLocation::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/volume-purchasing-locations/'.Path::segment((string) $this->id);
    }
}
