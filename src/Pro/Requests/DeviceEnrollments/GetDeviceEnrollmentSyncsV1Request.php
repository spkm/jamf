<?php

namespace spkm\Jamf\Pro\Requests\DeviceEnrollments;

use spkm\Jamf\Pro\Data\DeviceEnrollmentInstanceSyncStatus;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get all instance sync states for a single Device Enrollment Instance: GET /v1/device-enrollments/{id}/syncs.
 *
 * Get all instance sync states for a single instance
 */
class GetDeviceEnrollmentSyncsV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

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
        return '/v1/device-enrollments/'.Path::segment((string) $this->id).'/syncs';
    }
}
