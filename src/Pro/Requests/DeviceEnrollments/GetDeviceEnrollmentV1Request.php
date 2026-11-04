<?php

namespace spkm\Jamf\Pro\Requests\DeviceEnrollments;

use spkm\Jamf\Pro\Data\DeviceEnrollmentInstance;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a Device Enrollment Instance with the supplied id: GET /v1/device-enrollments/{id}.
 *
 * Retrieves a Device Enrollment Instance with the supplied id
 */
class GetDeviceEnrollmentV1Request extends GetRequest
{
    protected ?string $dto = DeviceEnrollmentInstance::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/device-enrollments/'.Path::segment((string) $this->id);
    }
}
