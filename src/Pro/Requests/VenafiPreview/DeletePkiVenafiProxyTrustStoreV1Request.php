<?php

namespace spkm\Jamf\Pro\Requests\VenafiPreview;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Removes the PKI Proxy Server public key used to secure communication between Jamf Pro and a Jamf Pro PKI Proxy Server: DELETE /v1/pki/venafi/{id}/proxy-trust-store.
 *
 * Removes the uploaded PKI Proxy Server public key to do basic TLS certificate validation between Jamf Pro and a Jamf
 * Pro PKI Proxy Server
 */
class DeletePkiVenafiProxyTrustStoreV1Request extends DeleteRequest
{
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
