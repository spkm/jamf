<?php

namespace spkm\Jamf\Pro\Requests\CertificateAuthority;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Returns current Certificate Authority (CA) with provided ID in PEM format: GET /v1/pki/certificate-authority/{id}/pem.
 */
class GetPkiCertificateAuthorityPemV1Request extends GetRequest
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
        return '/v1/pki/certificate-authority/'.Path::segment((string) $this->id).'/pem';
    }
}
