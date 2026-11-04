<?php

namespace spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches;

use spkm\Jamf\Pro\Data\AdvancedSearch;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Advanced Search object: GET /v1/advanced-mobile-device-searches/{id}.
 *
 * Gets Specified Advanced Search Object
 */
class GetAdvancedMobileDeviceSearchV1Request extends GetRequest
{
    protected ?string $dto = AdvancedSearch::class;

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
