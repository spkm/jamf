<?php

namespace spkm\Jamf\Pro\Requests\CertificateAuthority;

use spkm\Jamf\Pro\Data\CertificateRecord;
use spkm\Jamf\Requests\GetRequest;

/**
 * Returns X.509 details of the active Certificate Authority (CA): GET /v1/pki/certificate-authority/active.
 */
class GetPkiCertificateAuthorityActiveV1Request extends GetRequest
{
    protected ?string $dto = CertificateRecord::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/certificate-authority/active';
    }
}
