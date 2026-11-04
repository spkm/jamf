<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\MobileDeviceEnrollmentProfile\GetMobileDeviceEnrollmentProfileDownloadProfileV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The mobile-device-enrollment-profile endpoints of the Jamf Pro API, from Jamf::mobileDeviceEnrollmentProfile().
 *
 * @extends BaseResource<Data>
 */
class MobileDeviceEnrollmentProfileResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Retrieve the MDM Enrollment Profile: GET /v1/mobile-device-enrollment-profile/{id}/download-profile.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMobileDeviceEnrollmentProfileDownloadProfileV1(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetMobileDeviceEnrollmentProfileDownloadProfileV1Request($id, $options));
    }
}
