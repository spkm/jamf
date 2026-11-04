<?php

namespace spkm\Jamf\Pro\Requests\DeviceEnrollments;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create a Device Enrollment Instance with the supplied Token: POST /v1/device-enrollments/upload-token.
 *
 * Creates a device enrollment instance with the supplied token.
 */
class UploadDeviceEnrollmentsTokenV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = HrefResponse::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/device-enrollments/upload-token';
    }
}
