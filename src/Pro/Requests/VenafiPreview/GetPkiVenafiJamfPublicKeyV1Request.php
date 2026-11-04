<?php

namespace spkm\Jamf\Pro\Requests\VenafiPreview;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Downloads a certificate used to secure communication between Jamf Pro and a Jamf Pro PKI Proxy Server: GET /v1/pki/venafi/{id}/jamf-public-key.
 *
 * Downloads a certificate for an existing Venafi configuration that can be used to secure communication between Jamf
 * Pro and a Jamf Pro PKI Proxy Server
 */
class GetPkiVenafiJamfPublicKeyV1Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'application/pem-certificate-chain';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/venafi/'.Path::segment((string) $this->id).'/jamf-public-key';
    }
}
