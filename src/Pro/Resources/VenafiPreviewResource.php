<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\VenafiCaRecord;
use spkm\Jamf\Pro\Data\VenafiPkiPayloadRecord;
use spkm\Jamf\Pro\Data\VenafiServiceStatus;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\VenafiPreview\CreatePkiVenafiHistoryV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\CreatePkiVenafiProxyTrustStoreV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\CreatePkiVenafiV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\DeletePkiVenafiProxyTrustStoreV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\DeletePkiVenafiV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\GetPkiVenafiConnectionStatusV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\GetPkiVenafiDependentProfilesV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\GetPkiVenafiHistoryV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\GetPkiVenafiJamfPublicKeyV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\GetPkiVenafiProxyTrustStoreV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\GetPkiVenafiV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\RegeneratePkiVenafiJamfPublicKeyV1Request;
use spkm\Jamf\Pro\Requests\VenafiPreview\UpdatePkiVenafiV1Request;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Resources\BaseResource;
use spkm\Jamf\Resources\PagedResource;

/**
 * The venafi-preview endpoints of the Jamf Pro API, from Jamf::venafiPreview().
 *
 * @extends BaseResource<Data>
 */
class VenafiPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Add specified Venafi CA Object Note: POST /v1/pki/venafi/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPkiVenafiHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreatePkiVenafiHistoryV1Request($id, $body, $options));
    }

    /**
     * Uploads the PKI Proxy Server public key to secure communication between Jamf Pro and a Jamf Pro PKI Proxy
     * Server: POST /v1/pki/venafi/{id}/proxy-trust-store.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPkiVenafiProxyTrustStoreV1(int|string $id, string $text, array $options = []): bool
    {
        return $this->perform(new CreatePkiVenafiProxyTrustStoreV1Request($id, $text, $options));
    }

    /**
     * Create a PKI configuration in Jamf Pro for Venafi: POST /v1/pki/venafi.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPkiVenafiV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreatePkiVenafiV1Request($body, $options));
    }

    /**
     * Removes the PKI Proxy Server public key used to secure communication between Jamf Pro and a Jamf Pro PKI Proxy
     * Server: DELETE /v1/pki/venafi/{id}/proxy-trust-store.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePkiVenafiProxyTrustStoreV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePkiVenafiProxyTrustStoreV1Request($id, $options));
    }

    /**
     * Delete a Venafi PKI configuration from Jamf Pro: DELETE /v1/pki/venafi/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePkiVenafiV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePkiVenafiV1Request($id, $options));
    }

    /**
     * Tests the communication between Jamf Pro and a Jamf Pro PKI Proxy Server: GET
     * /v1/pki/venafi/{id}/connection-status.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiVenafiConnectionStatusV1(int|string $id, array $options = []): ?VenafiServiceStatus
    {
        return $this->fetch(new GetPkiVenafiConnectionStatusV1Request($id, $options));
    }

    /**
     * Get configuration profile data using specified Venafi CA object: GET /v1/pki/venafi/{id}/dependent-profiles.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, VenafiPkiPayloadRecord>
     */
    public function getPkiVenafiDependentProfilesV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetPkiVenafiDependentProfilesV1Request($id, $options));
    }

    /**
     * Get specified Venafi CA history object: GET /v1/pki/venafi/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getPkiVenafiHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetPkiVenafiHistoryV1Request($id, $query));
    }

    /**
     * Downloads a certificate used to secure communication between Jamf Pro and a Jamf Pro PKI Proxy Server: GET
     * /v1/pki/venafi/{id}/jamf-public-key.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiVenafiJamfPublicKeyV1(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetPkiVenafiJamfPublicKeyV1Request($id, $options));
    }

    /**
     * Downloads the PKI Proxy Server public key to secure communication between Jamf Pro and a Jamf Pro PKI Proxy
     * Server: GET /v1/pki/venafi/{id}/proxy-trust-store.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiVenafiProxyTrustStoreV1(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetPkiVenafiProxyTrustStoreV1Request($id, $options));
    }

    /**
     * Retrieve a Venafi PKI configuration from Jamf Pro: GET /v1/pki/venafi/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPkiVenafiV1(int|string $id, array $options = []): ?VenafiCaRecord
    {
        return $this->fetch(new GetPkiVenafiV1Request($id, $options));
    }

    /**
     * Regenerates a certificate used to secure communication between Jamf Pro and a Jamf Pro PKI Proxy Server: POST
     * /v1/pki/venafi/{id}/jamf-public-key/regenerate.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function regeneratePkiVenafiJamfPublicKeyV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new RegeneratePkiVenafiJamfPublicKeyV1Request($id, $options));
    }

    /**
     * Update a Venafi PKI configuration in Jamf Pro: PATCH /v1/pki/venafi/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updatePkiVenafiV1(int|string $id, array|JsonSerializable $body, array $options = []): ?VenafiCaRecord
    {
        return $this->fetch(new UpdatePkiVenafiV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
