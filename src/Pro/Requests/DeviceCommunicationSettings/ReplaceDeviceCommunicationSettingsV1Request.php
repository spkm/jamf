<?php

namespace spkm\Jamf\Pro\Requests\DeviceCommunicationSettings;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\DeviceCommunicationSettings;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update device communication settings: PUT /v1/device-communication-settings.
 */
class ReplaceDeviceCommunicationSettingsV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = DeviceCommunicationSettings::class;

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
        return '/v1/device-communication-settings';
    }
}
