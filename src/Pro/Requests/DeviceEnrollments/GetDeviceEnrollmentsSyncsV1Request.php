<?php

namespace spkm\Jamf\Pro\Requests\DeviceEnrollments;

use spkm\Jamf\Pro\Data\DeviceEnrollmentInstanceSyncStatus;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get all instance sync states for all Device Enrollment Instances: GET /v1/device-enrollments/syncs.
 *
 * Get all instance sync states for all instances
 */
class GetDeviceEnrollmentsSyncsV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = DeviceEnrollmentInstanceSyncStatus::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/device-enrollments/syncs';
    }
}
