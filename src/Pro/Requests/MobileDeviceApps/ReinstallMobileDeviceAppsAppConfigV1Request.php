<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceApps;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Reinstall App Config for Managed iOS Apps: POST /v1/mobile-device-apps/reinstall-app-config.
 *
 * Redeploys the managed app configuration for a specific app on a specific device using the
 * $APP_CONFIG_REINSTALL_CODE generated during deployment. This endpoint does not require authorization, only the
 * re-install code. The code does not contain any user authentication information. For example usage, see the
 * following Teacher app documentation: [Teacher App Manged App
 * Configuration](https://learn.jamf.com/bundle/jamf-teacher-configuration-guide/page/Jamf_Teacher_Integration_with_Jamf_Pro.html)
 */
class ReinstallMobileDeviceAppsAppConfigV1Request extends WriteRequest
{
    protected string $responseShape = self::NONE;

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
        return '/v1/mobile-device-apps/reinstall-app-config';
    }
}
