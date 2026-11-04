<?php

namespace spkm\Jamf\Pro\Requests\MobileDevices;

use spkm\Jamf\Pro\Data\MobileDeviceV2;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get Mobile Device objects: GET /v2/mobile-devices.
 *
 * Gets Mobile Device objects.
 */
class GetMobileDevicesV2Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = MobileDeviceV2::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mobile-devices';
    }
}
