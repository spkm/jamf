<?php

namespace spkm\Jamf\Pro\Requests\MobileDevices;

use spkm\Jamf\Pro\Data\MobileDeviceResponse;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Return paginated Mobile Device Inventory records of all paired devices for the device: GET /v2/mobile-devices/{id}/paired-devices.
 */
class GetMobileDevicePairedDevicesV2Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected bool $sectioned = true;

    protected ?string $dto = MobileDeviceResponse::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected int|string $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mobile-devices/'.Path::segment((string) $this->id).'/paired-devices';
    }
}
