<?php

namespace spkm\Jamf\Pro\Requests\CertificateAuthority;

use spkm\Jamf\Requests\GetRequest;

/**
 * Returns X.509 of active Certificate Authority (CA) in DER format: GET /v1/pki/certificate-authority/active/der.
 */
class GetPkiCertificateAuthorityActiveDerV1Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'application/pkix-cert';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/certificate-authority/active/der';
    }
}
