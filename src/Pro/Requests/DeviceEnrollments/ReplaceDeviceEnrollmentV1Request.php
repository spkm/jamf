<?php

namespace spkm\Jamf\Pro\Requests\DeviceEnrollments;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\DeviceEnrollmentInstance;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a Device Enrollment Instance with the supplied id: PUT /v1/device-enrollments/{id}.
 *
 * Updates a Device Enrollment Instance with the supplied id
 */
class ReplaceDeviceEnrollmentV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = DeviceEnrollmentInstance::class;

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
        return '/v1/device-enrollments/'.Path::segment((string) $this->id);
    }
}
