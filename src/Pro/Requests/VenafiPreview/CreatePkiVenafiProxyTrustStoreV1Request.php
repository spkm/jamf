<?php

namespace spkm\Jamf\Pro\Requests\VenafiPreview;

use spkm\Jamf\Requests\TextBodyRequest;
use spkm\Jamf\Support\Path;

/**
 * Uploads the PKI Proxy Server public key to secure communication between Jamf Pro and a Jamf Pro PKI Proxy Server: POST /v1/pki/venafi/{id}/proxy-trust-store.
 *
 * Uploads the PKI Proxy Server public key to do basic TLS certificate validation between Jamf Pro and a Jamf Pro PKI
 * Proxy Server
 */
class CreatePkiVenafiProxyTrustStoreV1Request extends TextBodyRequest
{
    protected string $contentType = 'application/pem-certificate-chain';

    protected string $responseShape = self::NONE;

    /**
     * @param  string  $text  The body, as application/pem-certificate-chain.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, string $text, array $options = [])
    {
        $this->text = $text;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/venafi/'.Path::segment((string) $this->id).'/proxy-trust-store';
    }
}
