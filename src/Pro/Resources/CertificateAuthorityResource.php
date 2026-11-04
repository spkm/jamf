<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\CertificateRecord;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\CertificateAuthority\GetPkiCertificateAuthorityActiveDerV1Request;
use spkm\Jamf\Pro\Requests\CertificateAuthority\GetPkiCertificateAuthorityActivePemV1Request;
use spkm\Jamf\Pro\Requests\CertificateAuthority\GetPkiCertificateAuthorityActiveV1Request;
use spkm\Jamf\Pro\Requests\CertificateAuthority\GetPkiCertificateAuthorityDerV1Request;
use spkm\Jamf\Pro\Requests\CertificateAuthority\GetPkiCertificateAuthorityPemV1Request;
use spkm\Jamf\Pro\Requests\CertificateAuthority\GetPkiCertificateAuthorityV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The certificate-authority endpoints of the Jamf Pro API, from Jamf::certificateAuthority().
 *
 * @extends BaseResource<Data>
 */
class CertificateAuthorityResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns X.509 of active Certificate Authority (CA) in DER format: GET /v1/pki/certificate-authority/active/der.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiCertificateAuthorityActiveDerV1(array $options = []): ?string
    {
        return $this->fetch(new GetPkiCertificateAuthorityActiveDerV1Request($options));
    }

    /**
     * Returns active Certificate Authority (CA) in PEM format: GET /v1/pki/certificate-authority/active/pem.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiCertificateAuthorityActivePemV1(array $options = []): ?string
    {
        return $this->fetch(new GetPkiCertificateAuthorityActivePemV1Request($options));
    }

    /**
     * Returns X.509 details of the active Certificate Authority (CA): GET /v1/pki/certificate-authority/active.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiCertificateAuthorityActiveV1(array $options = []): ?CertificateRecord
    {
        return $this->fetch(new GetPkiCertificateAuthorityActiveV1Request($options));
    }

    /**
     * Returns X.509 current Certificate Authority (CA) with provided ID in DER format: GET
     * /v1/pki/certificate-authority/{id}/der.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiCertificateAuthorityDerV1(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetPkiCertificateAuthorityDerV1Request($id, $options));
    }

    /**
     * Returns current Certificate Authority (CA) with provided ID in PEM format: GET
     * /v1/pki/certificate-authority/{id}/pem.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiCertificateAuthorityPemV1(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetPkiCertificateAuthorityPemV1Request($id, $options));
    }

    /**
     * Returns X.509 details of Certificate Authority (CA) with provided ID: GET /v1/pki/certificate-authority/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiCertificateAuthorityV1(int|string $id, array $options = []): ?CertificateRecord
    {
        return $this->fetch(new GetPkiCertificateAuthorityV1Request($id, $options));
    }
}
