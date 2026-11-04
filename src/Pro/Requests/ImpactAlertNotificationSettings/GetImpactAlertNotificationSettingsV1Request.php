<?php

namespace spkm\Jamf\Pro\Requests\ImpactAlertNotificationSettings;

use spkm\Jamf\Pro\Data\ImpactAlertNotificationSettingsV1;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Impact Alert Notification Settings: GET /v1/impact-alert-notification-settings.
 */
class GetImpactAlertNotificationSettingsV1Request extends GetRequest
{
    protected ?string $dto = ImpactAlertNotificationSettingsV1::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/impact-alert-notification-settings';
    }
}
