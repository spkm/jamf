<?php

namespace spkm\Jamf\Pro\Requests\AdcsSettings;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Validate AD CS Settings client certificate: POST /v1/pki/adcs-settings/validate-client-certificate.
 */
class ValidatePkiAdcsSettingsClientCertificateV1Request extends WriteRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/adcs-settings/validate-client-certificate';
    }
}
