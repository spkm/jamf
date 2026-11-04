<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\CloudDistributionPoint;
use spkm\Jamf\Pro\Data\CloudDistributionPointInventoryFileInfo;
use spkm\Jamf\Pro\Data\CloudDistributionPointTestConnection;
use spkm\Jamf\Pro\Data\CloudDistributionPointUploadCapability;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\CreateCloudDistributionPointFailUploadV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\CreateCloudDistributionPointHistoryV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\CreateCloudDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\DeleteCloudDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\GetCloudDistributionPointFilesV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\GetCloudDistributionPointHistoryV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\GetCloudDistributionPointTestConnectionV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\GetCloudDistributionPointUploadCapabilityV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\GetCloudDistributionPointV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\RefreshCloudDistributionPointInventoryV1Request;
use spkm\Jamf\Pro\Requests\CloudDistributionPoint\UpdateCloudDistributionPointV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The cloud-distribution-point endpoints of the Jamf Pro API, from Jamf::cloudDistributionPoint().
 *
 * @extends Builder<CloudDistributionPointInventoryFileInfo>
 */
class CloudDistributionPointResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, CloudDistributionPointInventoryFileInfo::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetCloudDistributionPointFilesV1Request($query);
    }

    /**
     * Marks a specific file upload as failed for the currently configured cloud distribution point: POST
     * /v1/cloud-distribution-point/fail-upload/{id}.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: file-name (required), type (required).
     */
    public function createCloudDistributionPointFailUploadV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new CreateCloudDistributionPointFailUploadV1Request($id, $options));
    }

    /**
     * Add specified cloud distribution point history object notes: POST /v1/cloud-distribution-point/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createCloudDistributionPointHistoryV1(array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateCloudDistributionPointHistoryV1Request($body, $options));
    }

    /**
     * Create cloud distribution point: POST /v1/cloud-distribution-point.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createCloudDistributionPointV1(array|JsonSerializable $body, array $options = []): ?CloudDistributionPoint
    {
        return $this->fetch(new CreateCloudDistributionPointV1Request($body, $options));
    }

    /**
     * Delete cloud distribution point: DELETE /v1/cloud-distribution-point.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteCloudDistributionPointV1(array $options = []): bool
    {
        return $this->perform(new DeleteCloudDistributionPointV1Request($options));
    }

    /**
     * Get the cloud distribution point Inventory files details: GET /v1/cloud-distribution-point/files.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<CloudDistributionPointInventoryFileInfo>
     */
    public function getCloudDistributionPointFilesV1(): PagedResource
    {
        return new PagedResource($this->pro(), CloudDistributionPointInventoryFileInfo::class, fn (Query $query) => new GetCloudDistributionPointFilesV1Request($query));
    }

    /**
     * Get cloud distribution point history details: GET /v1/cloud-distribution-point/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getCloudDistributionPointHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetCloudDistributionPointHistoryV1Request($query));
    }

    /**
     * Get the cloud distribution point test connection details: GET /v1/cloud-distribution-point/test-connection.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudDistributionPointTestConnectionV1(array $options = []): ?CloudDistributionPointTestConnection
    {
        return $this->fetch(new GetCloudDistributionPointTestConnectionV1Request($options));
    }

    /**
     * Finds specific information for the currently configured cloud distribution point: GET
     * /v1/cloud-distribution-point/upload-capability.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudDistributionPointUploadCapabilityV1(array $options = []): ?CloudDistributionPointUploadCapability
    {
        return $this->fetch(new GetCloudDistributionPointUploadCapabilityV1Request($options));
    }

    /**
     * Get the cloud distribution point Details: GET /v1/cloud-distribution-point.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudDistributionPointV1(array $options = []): ?CloudDistributionPoint
    {
        return $this->fetch(new GetCloudDistributionPointV1Request($options));
    }

    /**
     * Updates inventory data for the currently configured cloud distribution point: POST
     * /v1/cloud-distribution-point/refresh-inventory.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: file-name.
     */
    public function refreshCloudDistributionPointInventoryV1(array $options = []): bool
    {
        return $this->perform(new RefreshCloudDistributionPointInventoryV1Request($options));
    }

    /**
     * Update specific fields on a cloud distribution point: PATCH /v1/cloud-distribution-point.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateCloudDistributionPointV1(array|JsonSerializable $body, array $options = []): ?CloudDistributionPoint
    {
        return $this->fetch(new UpdateCloudDistributionPointV1Request($body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
