<?php

namespace spkm\Jamf\Pro\Requests\AdcsSettings;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create AD CS Settings configuration for either inbound or outbound mode: POST /v1/pki/adcs-settings.
 *
 * Create AD CS Settings configuration and initialize renewal monitor. Once set, the configuration cannot change
 * between inbound and outbound modes.
 */
class CreatePkiAdcsSettingsV1Request extends WriteRequest
{
    protected string $responseShape = self::TEXT;

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
        return '/v1/pki/adcs-settings';
    }
}
