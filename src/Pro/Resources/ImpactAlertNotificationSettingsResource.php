<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\ImpactAlertNotificationSettingsV1;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ImpactAlertNotificationSettings\GetImpactAlertNotificationSettingsV1Request;
use spkm\Jamf\Pro\Requests\ImpactAlertNotificationSettings\ReplaceImpactAlertNotificationSettingsV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The impact-alert-notification-settings endpoints of the Jamf Pro API, from Jamf::impactAlertNotificationSettings().
 *
 * @extends BaseResource<Data>
 */
class ImpactAlertNotificationSettingsResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get Impact Alert Notification Settings: GET /v1/impact-alert-notification-settings.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getImpactAlertNotificationSettingsV1(array $options = []): ?ImpactAlertNotificationSettingsV1
    {
        return $this->fetch(new GetImpactAlertNotificationSettingsV1Request($options));
    }

    /**
     * Update Impact Alert Notification Settings: PUT /v1/impact-alert-notification-settings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceImpactAlertNotificationSettingsV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new ReplaceImpactAlertNotificationSettingsV1Request($body, $options));
    }
}
