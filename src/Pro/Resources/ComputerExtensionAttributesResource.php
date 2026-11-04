<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Pro\Data\ComputerExtensionAttributes;
use spkm\Jamf\Pro\Data\ComputerExtensionAttributeTemplates;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\CreateComputerExtensionAttributeHistoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\CreateComputerExtensionAttributesV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\DeleteComputerExtensionAttributeV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\DeleteMultipleComputerExtensionAttributesV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributeDataDependencyV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributeDownloadV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributeHistoryV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributesTemplatesV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributesTemplateV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributesV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\GetComputerExtensionAttributeV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\ReplaceComputerExtensionAttributeV1Request;
use spkm\Jamf\Pro\Requests\ComputerExtensionAttributes\UploadComputerExtensionAttributesV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;
use SplFileInfo;

/**
 * The computer-extension-attributes endpoints of the Jamf Pro API, from Jamf::computerExtensionAttributes().
 *
 * @extends Builder<ComputerExtensionAttributes>
 */
class ComputerExtensionAttributesResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ComputerExtensionAttributes::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetComputerExtensionAttributesV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetComputerExtensionAttributeV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateComputerExtensionAttributesV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceComputerExtensionAttributeV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteComputerExtensionAttributeV1Request($id);
    }

    /**
     * Add specified Computer Extension Attribute history object notes: POST
     * /v1/computer-extension-attributes/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputerExtensionAttributeHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreateComputerExtensionAttributeHistoryV1Request($id, $body, $options));
    }

    /**
     * Create Computer Extension Attribute: POST /v1/computer-extension-attributes.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputerExtensionAttributesV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputerExtensionAttributesV1Request($body, $options));
    }

    /**
     * Remove specified Computer Extension Attribute: DELETE /v1/computer-extension-attributes/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerExtensionAttributeV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerExtensionAttributeV1Request($id, $options));
    }

    /**
     * Delete multiple Computer Extension Attribute at once: POST /v1/computer-extension-attributes/delete-multiple.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMultipleComputerExtensionAttributesV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new DeleteMultipleComputerExtensionAttributesV1Request($body, $options));
    }

    /**
     * Get smart group/advance search dependent objects for a specified computer extension attribute: GET
     * /v1/computer-extension-attributes/{id}/data-dependency.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function getComputerExtensionAttributeDataDependencyV1(int|string $id, array $options = []): Collection
    {
        return $this->fetch(new GetComputerExtensionAttributeDataDependencyV1Request($id, $options));
    }

    /**
     * Download the specified Computer Extension Attribute: GET /v1/computer-extension-attributes/{id}/download.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerExtensionAttributeDownloadV1(int|string $id, array $options = []): ?string
    {
        return $this->fetch(new GetComputerExtensionAttributeDownloadV1Request($id, $options));
    }

    /**
     * Get specified Computer Extension Attribute History object: GET /v1/computer-extension-attributes/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getComputerExtensionAttributeHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetComputerExtensionAttributeHistoryV1Request($id, $query));
    }

    /**
     * Get specified Computer Extension Attribute object: GET /v1/computer-extension-attributes/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerExtensionAttributeV1(int|string $id, array $options = []): ?ComputerExtensionAttributes
    {
        return $this->fetch(new GetComputerExtensionAttributeV1Request($id, $options));
    }

    /**
     * Get specified Computer Extension Attribute Template object: GET
     * /v1/computer-extension-attributes/templates/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerExtensionAttributesTemplateV1(int|string $id, array $options = []): ?ComputerExtensionAttributes
    {
        return $this->fetch(new GetComputerExtensionAttributesTemplateV1Request($id, $options));
    }

    /**
     * Retrieve All Computer Extension Attributes Templates: GET /v1/computer-extension-attributes/templates.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ComputerExtensionAttributeTemplates>
     */
    public function getComputerExtensionAttributesTemplatesV1(): PagedResource
    {
        return new PagedResource($this->pro(), ComputerExtensionAttributeTemplates::class, fn (Query $query) => new GetComputerExtensionAttributesTemplatesV1Request($query));
    }

    /**
     * Retrieve Computer Extension Attributes: GET /v1/computer-extension-attributes.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ComputerExtensionAttributes>
     */
    public function getComputerExtensionAttributesV1(): PagedResource
    {
        return new PagedResource($this->pro(), ComputerExtensionAttributes::class, fn (Query $query) => new GetComputerExtensionAttributesV1Request($query));
    }

    /**
     * Update specified Computer Extension Attribute object: PUT /v1/computer-extension-attributes/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceComputerExtensionAttributeV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ComputerExtensionAttributes
    {
        return $this->fetch(new ReplaceComputerExtensionAttributeV1Request($id, $body, $options));
    }

    /**
     * Upload Computer Extension Attribute: POST /v1/computer-extension-attributes/upload.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function uploadComputerExtensionAttributesV1(mixed $file, ?string $filename = null, array $options = []): ?ComputerExtensionAttributes
    {
        return $this->fetch(new UploadComputerExtensionAttributesV1Request($file, $filename, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
