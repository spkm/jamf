<?php

namespace spkm\Jamf\Pro\Requests\Digicert;

use JsonSerializable;
use spkm\Jamf\Requests\MergePatchRequest;
use spkm\Jamf\Support\Path;

/**
 * Update DigiCert Trust Lifecycle Manager configuration: PATCH /v1/pki/digicert/trust-lifecycle-manager/{id}.
 */
class UpdatePkiDigicertTrustLifecycleManagerV1Request extends MergePatchRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/digicert/trust-lifecycle-manager/'.Path::segment((string) $this->id);
    }
}
