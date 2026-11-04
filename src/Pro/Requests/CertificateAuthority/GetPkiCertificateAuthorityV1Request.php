<?php

namespace spkm\Jamf\Pro\Requests\CertificateAuthority;

use spkm\Jamf\Pro\Data\CertificateRecord;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Returns X.509 details of Certificate Authority (CA) with provided ID: GET /v1/pki/certificate-authority/{id}.
 */
class GetPkiCertificateAuthorityV1Request extends GetRequest
{
    protected ?string $dto = CertificateRecord::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/certificate-authority/'.Path::segment((string) $this->id);
    }
}
