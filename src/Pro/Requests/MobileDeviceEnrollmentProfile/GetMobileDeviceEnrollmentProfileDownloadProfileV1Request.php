<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceEnrollmentProfile;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve the MDM Enrollment Profile: GET /v1/mobile-device-enrollment-profile/{id}/download-profile.
 */
class GetMobileDeviceEnrollmentProfileDownloadProfileV1Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'application/x-apple-aspen-config';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mobile-device-enrollment-profile/'.Path::segment((string) $this->id).'/download-profile';
    }
}
