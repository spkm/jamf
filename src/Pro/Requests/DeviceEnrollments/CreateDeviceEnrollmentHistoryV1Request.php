<?php

namespace spkm\Jamf\Pro\Requests\DeviceEnrollments;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Add Device Enrollment history object notes: POST /v1/device-enrollments/{id}/history.
 *
 * Adds device enrollment history object notes
 */
class CreateDeviceEnrollmentHistoryV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = HrefResponse::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/device-enrollments/'.Path::segment((string) $this->id).'/history';
    }
}
