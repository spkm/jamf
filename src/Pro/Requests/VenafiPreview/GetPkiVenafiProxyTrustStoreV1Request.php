<?php

namespace spkm\Jamf\Pro\Requests\VenafiPreview;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Downloads the PKI Proxy Server public key to secure communication between Jamf Pro and a Jamf Pro PKI Proxy Server: GET /v1/pki/venafi/{id}/proxy-trust-store.
 *
 * Downloads the uploaded PKI Proxy Server public key to do basic TLS certificate validation between Jamf Pro and a
 * Jamf Pro PKI Proxy Server
 */
class GetPkiVenafiProxyTrustStoreV1Request extends GetRequest
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
        return '/v1/pki/venafi/'.Path::segment((string) $this->id).'/proxy-trust-store';
    }
}
