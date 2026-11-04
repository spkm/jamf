<?php

namespace spkm\Jamf\Pro\Requests\DeviceEnrollmentsDevices;

use spkm\Jamf\Pro\Data\DeviceEnrollmentDevice;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a list of Devices assigned to the supplied id: GET /v1/device-enrollments/{id}/devices.
 *
 * Retrieves a list of devices assigned to the supplied id
 */
class GetDeviceEnrollmentDevicesV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = DeviceEnrollmentDevice::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/device-enrollments/'.Path::segment((string) $this->id).'/devices';
    }
}
