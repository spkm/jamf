<?php

namespace spkm\Jamf\Pro\Requests\DeviceEnrollments;

use JsonSerializable;
use spkm\Jamf\Pro\Data\DeviceEnrollmentDisownResponse;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Disown devices from the given Device Enrollment Instance: POST /v1/device-enrollments/{id}/disown.
 *
 * Disowns devices from the given device enrollment instance
 */
class DisownDeviceEnrollmentV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = DeviceEnrollmentDisownResponse::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/device-enrollments/'.Path::segment((string) $this->id).'/disown';
    }
}
