<?php

namespace spkm\Jamf\Pro\Requests\DeviceEnrollments;

use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve the Jamf Pro Device Enrollment public key: GET /v1/device-enrollments/public-key.
 *
 * Retrieve the Jamf Pro device enrollment public key
 */
class GetDeviceEnrollmentsPublicKeyV1Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'application/x-pem-file';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/device-enrollments/public-key';
    }
}
