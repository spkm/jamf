<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\SupervisionIdentity;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\CreateSupervisionIdentitiesV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\DeleteSupervisionIdentityV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\GetSupervisionIdentitiesV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\GetSupervisionIdentityDownloadV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\GetSupervisionIdentityV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\ReplaceSupervisionIdentityV1Request;
use spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview\UploadSupervisionIdentitiesV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The supervision-identities-preview endpoints of the Jamf Pro API, from Jamf::supervisionIdentitiesPreview().
 *
 * @extends Builder<SupervisionIdentity>
 */
class SupervisionIdentitiesPreviewResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, SupervisionIdentity::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetSupervisionIdentitiesV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetSupervisionIdentityV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateSupervisionIdentitiesV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceSupervisionIdentityV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteSupervisionIdentityV1Request($id);
    }

    /**
     * Create a Supervision Identity for the supplied information: POST /v1/supervision-identities.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createSupervisionIdentitiesV1(array|JsonSerializable $body, array $options = []): ?SupervisionIdentity
    {
        return $this->fetch(new CreateSupervisionIdentitiesV1Request($body, $options));
    }

    /**
     * Delete a Supervision Identity with the supplied id: DELETE /v1/supervision-identities/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteSupervisionIdentityV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteSupervisionIdentityV1Request($id, $options));
    }

    /**
     * Search for sorted and paged Supervision Identities: GET /v1/supervision-identities.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<SupervisionIdentity>
     */
    public function getSupervisionIdentitiesV1(): PagedResource
    {
        return new PagedResource($this->pro(), SupervisionIdentity::class, fn (Query $query) => new GetSupervisionIdentitiesV1Request($query));
    }

    /**
     * Download the Supervision Identity .p12 file: GET /v1/supervision-identities/{id}/download.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSupervisionIdentityDownloadV1(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetSupervisionIdentityDownloadV1Request($id, $options));
    }

    /**
     * Retrieve a Supervision Identity with the supplied id: GET /v1/supervision-identities/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSupervisionIdentityV1(int|string $id, array $options = []): ?SupervisionIdentity
    {
        return $this->fetch(new GetSupervisionIdentityV1Request($id, $options));
    }

    /**
     * Update a Supervision Identity with the supplied information: PUT /v1/supervision-identities/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceSupervisionIdentityV1(int|string $id, array|JsonSerializable $body, array $options = []): ?SupervisionIdentity
    {
        return $this->fetch(new ReplaceSupervisionIdentityV1Request($id, $body, $options));
    }

    /**
     * Upload the Supervision Identity .p12 file: POST /v1/supervision-identities/upload.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function uploadSupervisionIdentitiesV1(array|JsonSerializable $body, array $options = []): ?SupervisionIdentity
    {
        return $this->fetch(new UploadSupervisionIdentitiesV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
