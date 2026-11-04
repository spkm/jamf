<?php

namespace spkm\Jamf\Pro\Requests\VenafiPreview;

use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Regenerates a certificate used to secure communication between Jamf Pro and a Jamf Pro PKI Proxy Server: POST /v1/pki/venafi/{id}/jamf-public-key/regenerate.
 *
 * Regenerates a certificate for an existing Venafi configuration that can be used to secure communication between
 * Jamf Pro and a Jamf Pro PKI Proxy Server
 */
class RegeneratePkiVenafiJamfPublicKeyV1Request extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/venafi/'.Path::segment((string) $this->id).'/jamf-public-key/regenerate';
    }
}
