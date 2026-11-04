<?php

namespace spkm\Jamf\Pro\Requests\CertificateAuthority;

use spkm\Jamf\Requests\GetRequest;

/**
 * Returns active Certificate Authority (CA) in PEM format: GET /v1/pki/certificate-authority/active/pem.
 */
class GetPkiCertificateAuthorityActivePemV1Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'application/pem-certificate-chain';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/certificate-authority/active/pem';
    }
}
