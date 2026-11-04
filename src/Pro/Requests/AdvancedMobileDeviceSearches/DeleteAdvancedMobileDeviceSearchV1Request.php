<?php

namespace spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified Advanced Search object: DELETE /v1/advanced-mobile-device-searches/{id}.
 *
 * Removes specified Advanced Search Object
 */
class DeleteAdvancedMobileDeviceSearchV1Request extends DeleteRequest
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
        return '/v1/advanced-mobile-device-searches/'.Path::segment((string) $this->id);
    }
}
