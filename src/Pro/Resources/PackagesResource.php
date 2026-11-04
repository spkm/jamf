<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\Package;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Packages\CreatePackageHistoryV1Request;
use spkm\Jamf\Pro\Requests\Packages\CreatePackageManifestV1Request;
use spkm\Jamf\Pro\Requests\Packages\CreatePackagesV1Request;
use spkm\Jamf\Pro\Requests\Packages\DeleteMultiplePackagesV1Request;
use spkm\Jamf\Pro\Requests\Packages\DeletePackageManifestV1Request;
use spkm\Jamf\Pro\Requests\Packages\DeletePackageV1Request;
use spkm\Jamf\Pro\Requests\Packages\ExportPackageHistoryV1Request;
use spkm\Jamf\Pro\Requests\Packages\ExportPackagesV1Request;
use spkm\Jamf\Pro\Requests\Packages\GetPackageHistoryV1Request;
use spkm\Jamf\Pro\Requests\Packages\GetPackagesV1Request;
use spkm\Jamf\Pro\Requests\Packages\GetPackageV1Request;
use spkm\Jamf\Pro\Requests\Packages\ReplacePackageV1Request;
use spkm\Jamf\Pro\Requests\Packages\UploadPackageV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;
use SplFileInfo;

/**
 * The packages endpoints of the Jamf Pro API, from Jamf::packages().
 *
 * @extends Builder<Package>
 */
class PackagesResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, Package::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetPackagesV1Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetPackageV1Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreatePackagesV1Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplacePackageV1Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeletePackageV1Request($id);
    }

    /**
     * Add specified Package history object notes: POST /v1/packages/{id}/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPackageHistoryV1(int|string $id, array|JsonSerializable $body, array $options = []): ?ObjectHistory
    {
        return $this->fetch(new CreatePackageHistoryV1Request($id, $body, $options));
    }

    /**
     * Add a manifest to a package: POST /v1/packages/{id}/manifest.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPackageManifestV1(int|string $id, mixed $file, ?string $filename = null, array $options = []): ?Package
    {
        return $this->fetch(new CreatePackageManifestV1Request($id, $file, $filename, $options));
    }

    /**
     * Create package: POST /v1/packages.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPackagesV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreatePackagesV1Request($body, $options));
    }

    /**
     * Delete multiple packages at once: POST /v1/packages/delete-multiple.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMultiplePackagesV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new DeleteMultiplePackagesV1Request($body, $options));
    }

    /**
     * Delete the manifest for a specified package: DELETE /v1/packages/{id}/manifest.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePackageManifestV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePackageManifestV1Request($id, $options));
    }

    /**
     * Remove specified package: DELETE /v1/packages/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePackageV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePackageV1Request($id, $options));
    }

    /**
     * Export history object collection in specified format for specified Packages: POST
     * /v1/packages/{id}/history/export.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: export-fields, export-labels, page,
     *                                         page-size, sort, filter.
     */
    public function exportPackageHistoryV1(int|string $id, array|JsonSerializable $body = [], array $options = []): ?string
    {
        return $this->fetch(new ExportPackageHistoryV1Request($id, $body, $options));
    }

    /**
     * Export Packages collection: POST /v1/packages/export.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: export-fields, export-labels, page,
     *                                         page-size, sort, filter.
     */
    public function exportPackagesV1(array|JsonSerializable $body = [], array $options = []): ?string
    {
        return $this->fetch(new ExportPackagesV1Request($body, $options));
    }

    /**
     * Get specified Package History object: GET /v1/packages/{id}/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getPackageHistoryV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetPackageHistoryV1Request($id, $query));
    }

    /**
     * Get specified Package object: GET /v1/packages/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPackageV1(int|string $id, array $options = []): ?Package
    {
        return $this->fetch(new GetPackageV1Request($id, $options));
    }

    /**
     * Retrieve Packages: GET /v1/packages.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<Package>
     */
    public function getPackagesV1(): PagedResource
    {
        return new PagedResource($this->pro(), Package::class, fn (Query $query) => new GetPackagesV1Request($query));
    }

    /**
     * Update specified package object: PUT /v1/packages/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replacePackageV1(int|string $id, array|JsonSerializable $body, array $options = []): ?Package
    {
        return $this->fetch(new ReplacePackageV1Request($id, $body, $options));
    }

    /**
     * Upload package: POST /v1/packages/{id}/upload.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function uploadPackageV1(int|string $id, mixed $file, ?string $filename = null, array $options = []): ?HrefResponse
    {
        return $this->fetch(new UploadPackageV1Request($id, $file, $filename, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
