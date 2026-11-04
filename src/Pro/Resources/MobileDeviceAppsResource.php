<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\MobileDeviceApps\ReinstallMobileDeviceAppsAppConfigV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The mobile-device-apps endpoints of the Jamf Pro API, from Jamf::mobileDeviceApps().
 *
 * @extends BaseResource<Data>
 */
class MobileDeviceAppsResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Reinstall App Config for Managed iOS Apps: POST /v1/mobile-device-apps/reinstall-app-config.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function reinstallMobileDeviceAppsAppConfigV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new ReinstallMobileDeviceAppsAppConfigV1Request($body, $options));
    }
}
