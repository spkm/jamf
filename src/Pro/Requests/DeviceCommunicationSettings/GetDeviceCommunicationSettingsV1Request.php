<?php

namespace spkm\Jamf\Pro\Requests\DeviceCommunicationSettings;

use spkm\Jamf\Pro\Data\DeviceCommunicationSettings;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieves all settings for device communication: GET /v1/device-communication-settings.
 *
 * Retrieves all device communication settings, including automatic renewal of the MDM profile.
 */
class GetDeviceCommunicationSettingsV1Request extends GetRequest
{
    protected ?string $dto = DeviceCommunicationSettings::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/device-communication-settings';
    }
}
