<?php

namespace spkm\Jamf\Pro\Requests\AdvancedMobileDeviceSearches;

use spkm\Jamf\Pro\Data\AdvancedSearch;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Advanced Search objects: GET /v1/advanced-mobile-device-searches.
 *
 * Gets Advanced Search Objects
 */
class GetAdvancedMobileDeviceSearchesV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = AdvancedSearch::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/advanced-mobile-device-searches';
    }
}
