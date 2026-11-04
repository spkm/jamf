<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\DigicertConnectionStatus;
use spkm\Jamf\Pro\Data\DigicertDependency;
use spkm\Jamf\Pro\Data\DigiCertSettingResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Digicert\CreatePkiDigicertTrustLifecycleManagerV1Request;
use spkm\Jamf\Pro\Requests\Digicert\DeletePkiDigicertTrustLifecycleManagerV1Request;
use spkm\Jamf\Pro\Requests\Digicert\GetPkiDigicertTrustLifecycleManagerConnectionStatusV1Request;
use spkm\Jamf\Pro\Requests\Digicert\GetPkiDigicertTrustLifecycleManagerDependenciesV1Request;
use spkm\Jamf\Pro\Requests\Digicert\GetPkiDigicertTrustLifecycleManagerPrivilegeCheckV1Request;
use spkm\Jamf\Pro\Requests\Digicert\GetPkiDigicertTrustLifecycleManagerV1Request;
use spkm\Jamf\Pro\Requests\Digicert\UpdatePkiDigicertTrustLifecycleManagerV1Request;
use spkm\Jamf\Pro\Requests\Digicert\ValidatePkiDigicertTrustLifecycleManagerClientCertificateV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The digicert endpoints of the Jamf Pro API, from Jamf::digicert().
 *
 * @extends BaseResource<Data>
 */
class DigicertResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create DigiCert Trust Lifecycle Manager configuration with client authentication via client certificate: POST
     * /v1/pki/digicert/trust-lifecycle-manager.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPkiDigicertTrustLifecycleManagerV1(array|JsonSerializable $body, array $options = []): ?string
    {
        return $this->fetch(new CreatePkiDigicertTrustLifecycleManagerV1Request($body, $options));
    }

    /**
     * Delete DigiCert Trust Lifecycle Manager configuration: DELETE /v1/pki/digicert/trust-lifecycle-manager/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePkiDigicertTrustLifecycleManagerV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePkiDigicertTrustLifecycleManagerV1Request($id, $options));
    }

    /**
     * Get connection status of DigiCert Trust Lifecycle Manager for a given ID: GET
     * /v1/pki/digicert/trust-lifecycle-manager/{id}/connection-status.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiDigicertTrustLifecycleManagerConnectionStatusV1(int|string $id, array $options = []): ?DigicertConnectionStatus
    {
        return $this->fetch(new GetPkiDigicertTrustLifecycleManagerConnectionStatusV1Request($id, $options));
    }

    /**
     * Retrieve list of DigiCert Trust Lifecycle Manager Settings dependencies: GET
     * /v1/pki/digicert/trust-lifecycle-manager/{id}/dependencies.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, DigicertDependency>
     */
    public function getPkiDigicertTrustLifecycleManagerDependenciesV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetPkiDigicertTrustLifecycleManagerDependenciesV1Request($id, $options));
    }

    /**
     * Check DigiCert account permissions for certificate deployment: GET
     * /v1/pki/digicert/trust-lifecycle-manager/{id}/privilege-check.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiDigicertTrustLifecycleManagerPrivilegeCheckV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new GetPkiDigicertTrustLifecycleManagerPrivilegeCheckV1Request($id, $options));
    }

    /**
     * Retrieve DigiCert Trust Lifecycle Manager configuration: GET /v1/pki/digicert/trust-lifecycle-manager/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiDigicertTrustLifecycleManagerV1(int|string $id, array $options = []): ?DigiCertSettingResponse
    {
        return $this->fetch(new GetPkiDigicertTrustLifecycleManagerV1Request($id, $options));
    }

    /**
     * Update DigiCert Trust Lifecycle Manager configuration: PATCH /v1/pki/digicert/trust-lifecycle-manager/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updatePkiDigicertTrustLifecycleManagerV1(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new UpdatePkiDigicertTrustLifecycleManagerV1Request($id, $body, $options));
    }

    /**
     * Validate DigiCert Trust Lifecycle Manager client certificate: POST
     * /v1/pki/digicert/trust-lifecycle-manager/validate-client-certificate.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function validatePkiDigicertTrustLifecycleManagerClientCertificateV1(array|JsonSerializable $body = [], array $options = []): bool
    {
        return $this->perform(new ValidatePkiDigicertTrustLifecycleManagerClientCertificateV1Request($body, $options));
    }
}
