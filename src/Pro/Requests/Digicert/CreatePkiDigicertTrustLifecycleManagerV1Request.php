<?php

namespace spkm\Jamf\Pro\Requests\Digicert;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Create DigiCert Trust Lifecycle Manager configuration with client authentication via client certificate: POST /v1/pki/digicert/trust-lifecycle-manager.
 *
 * Create DigiCert Trust Lifecycle Manager configuration and initialize renewal monitor.
 */
class CreatePkiDigicertTrustLifecycleManagerV1Request extends WriteRequest
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
        return '/v1/pki/digicert/trust-lifecycle-manager';
    }
}
