<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\DeviceEnrollmentDevice;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\DeviceEnrollmentsDevices\GetDeviceEnrollmentDevicesV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The device-enrollments-devices endpoints of the Jamf Pro API, from Jamf::deviceEnrollmentsDevices().
 *
 * @extends BaseResource<Data>
 */
class DeviceEnrollmentsDevicesResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Retrieve a list of Devices assigned to the supplied id: GET /v1/device-enrollments/{id}/devices.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, DeviceEnrollmentDevice>
     */
    public function getDeviceEnrollmentDevicesV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetDeviceEnrollmentDevicesV1Request($id, $options));
    }
}
