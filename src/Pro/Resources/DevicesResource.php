<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\DeviceGroup;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Devices\GetDeviceGroupsV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The devices endpoints of the Jamf Pro API, from Jamf::devices().
 *
 * @extends BaseResource<Data>
 */
class DevicesResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Return a list of groups for a device: GET /v1/devices/{id}/groups.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, DeviceGroup>
     */
    public function getDeviceGroupsV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetDeviceGroupsV1Request($id, $options));
    }
}
