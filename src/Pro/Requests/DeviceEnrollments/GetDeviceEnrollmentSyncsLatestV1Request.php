<?php

namespace spkm\Jamf\Pro\Requests\DeviceEnrollments;

use spkm\Jamf\Pro\Data\DeviceEnrollmentInstanceSyncStatus;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get the latest sync state for a single Device Enrollment Instance: GET /v1/device-enrollments/{id}/syncs/latest.
 *
 * Get the latest sync state for a single instance
 */
class GetDeviceEnrollmentSyncsLatestV1Request extends GetRequest
{
    protected ?string $dto = DeviceEnrollmentInstanceSyncStatus::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/device-enrollments/'.Path::segment((string) $this->id).'/syncs/latest';
    }
}
