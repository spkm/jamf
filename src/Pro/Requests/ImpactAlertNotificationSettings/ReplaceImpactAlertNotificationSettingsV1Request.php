<?php

namespace spkm\Jamf\Pro\Requests\ImpactAlertNotificationSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update Impact Alert Notification Settings: PUT /v1/impact-alert-notification-settings.
 */
class ReplaceImpactAlertNotificationSettingsV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

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
        return '/v1/impact-alert-notification-settings';
    }
}
