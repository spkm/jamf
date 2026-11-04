<?php

namespace spkm\Jamf\Pro\Requests\VolumePurchasingLocations;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a Volume Purchasing Location with the supplied id: DELETE /v1/volume-purchasing-locations/{id}.
 *
 * Deletes a Volume Purchasing Location with the supplied id
 */
class DeleteVolumePurchasingLocationV1Request extends DeleteRequest
{
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
