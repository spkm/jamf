<?php

namespace spkm\Jamf\Pro\Requests\CertificateAuthority;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Returns X.509 current Certificate Authority (CA) with provided ID in DER format: GET /v1/pki/certificate-authority/{id}/der.
 */
class GetPkiCertificateAuthorityDerV1Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'application/pkix-cert';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/certificate-authority/'.Path::segment((string) $this->id).'/der';
    }
}
