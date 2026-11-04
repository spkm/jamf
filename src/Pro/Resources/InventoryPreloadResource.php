<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\InventoryPreloadCsvValidationSuccess;
use spkm\Jamf\Pro\Data\InventoryPreloadExtensionAttributeColumn;
use spkm\Jamf\Pro\Data\InventoryPreloadRecordV2;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\InventoryPreload\CreateInventoryPreloadCsvV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\CreateInventoryPreloadHistoryV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\CreateInventoryPreloadRecordsV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\DeleteInventoryPreloadRecordsAllV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\DeleteInventoryPreloadRecordV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\ExportInventoryPreloadV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\GetInventoryPreloadCsvTemplateV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\GetInventoryPreloadCsvV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\GetInventoryPreloadEaColumnsV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\GetInventoryPreloadHistoryV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\GetInventoryPreloadRecordsV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\GetInventoryPreloadRecordV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\ReplaceInventoryPreloadRecordV2Request;
use spkm\Jamf\Pro\Requests\InventoryPreload\ValidateInventoryPreloadCsvV2Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;
use SplFileInfo;

/**
 * The inventory-preload endpoints of the Jamf Pro API, from Jamf::inventoryPreload().
 *
 * @extends Builder<ObjectHistory>
 */
class InventoryPreloadResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistory::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetInventoryPreloadHistoryV2Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateInventoryPreloadHistoryV2Request($body);
    }

    /**
     * Create one or more new Inventory Preload records using CSV: POST /v2/inventory-preload/csv.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, HrefResponse>
     */
    public function createInventoryPreloadCsvV2(mixed $file, ?string $filename = null, array $options = []): Collection
    {
        return $this->fetch(new CreateInventoryPreloadCsvV2Request($file, $filename, $options));
    }

    /**
     * Add Inventory Preload history object notes: POST /v2/inventory-preload/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createInventoryPreloadHistoryV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateInventoryPreloadHistoryV2Request($body, $options));
    }

    /**
     * Create a new Inventory Preload record using JSON: POST /v2/inventory-preload/records.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createInventoryPreloadRecordsV2(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateInventoryPreloadRecordsV2Request($body, $options));
    }

    /**
     * Delete an Inventory Preload record: DELETE /v2/inventory-preload/records/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteInventoryPreloadRecordV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteInventoryPreloadRecordV2Request($id, $options));
    }

    /**
     * Delete all Inventory Preload records: POST /v2/inventory-preload/records/delete-all.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteInventoryPreloadRecordsAllV2(array $options = []): bool
    {
        return $this->perform(new DeleteInventoryPreloadRecordsAllV2Request($options));
    }

    /**
     * Export a collection of inventory preload records: POST /v2/inventory-preload/export.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options Jamf documents: export-fields, export-labels, page,
     *                                         page-size, sort, filter.
     */
    public function exportInventoryPreloadV2(array|JsonSerializable $body = [], array $options = []): ?string
    {
        return $this->fetch(new ExportInventoryPreloadV2Request($body, $options));
    }

    /**
     * Download the Inventory Preload CSV template: GET /v2/inventory-preload/csv-template.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getInventoryPreloadCsvTemplateV2(array $options = []): ?string
    {
        return $this->fetch(new GetInventoryPreloadCsvTemplateV2Request($options));
    }

    /**
     * Download all Inventory Preload records: GET /v2/inventory-preload/csv.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getInventoryPreloadCsvV2(array $options = []): ?string
    {
        return $this->fetch(new GetInventoryPreloadCsvV2Request($options));
    }

    /**
     * Retrieve a list of extension attribute columns: GET /v2/inventory-preload/ea-columns.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, InventoryPreloadExtensionAttributeColumn>
     */
    public function getInventoryPreloadEaColumnsV2(array $options = []): Collection
    {
        return $this->fetch(new GetInventoryPreloadEaColumnsV2Request($options));
    }

    /**
     * Get Inventory Preload history entries: GET /v2/inventory-preload/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getInventoryPreloadHistoryV2(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetInventoryPreloadHistoryV2Request($query));
    }

    /**
     * Get an Inventory Preload record: GET /v2/inventory-preload/records/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getInventoryPreloadRecordV2(int|string $id, array $options = []): ?InventoryPreloadRecordV2
    {
        return $this->fetch(new GetInventoryPreloadRecordV2Request($id, $options));
    }

    /**
     * Return all Inventory Preload records: GET /v2/inventory-preload/records.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<InventoryPreloadRecordV2>
     */
    public function getInventoryPreloadRecordsV2(): PagedResource
    {
        return new PagedResource($this->pro(), InventoryPreloadRecordV2::class, fn (Query $query) => new GetInventoryPreloadRecordsV2Request($query));
    }

    /**
     * Update an Inventory Preload record: PUT /v2/inventory-preload/records/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceInventoryPreloadRecordV2(int|string $id, array|JsonSerializable $body, array $options = []): ?InventoryPreloadRecordV2
    {
        return $this->fetch(new ReplaceInventoryPreloadRecordV2Request($id, $body, $options));
    }

    /**
     * Validate a given CSV file: POST /v2/inventory-preload/csv-validate.
     *
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function validateInventoryPreloadCsvV2(mixed $file, ?string $filename = null, array $options = []): ?InventoryPreloadCsvValidationSuccess
    {
        return $this->fetch(new ValidateInventoryPreloadCsvV2Request($file, $filename, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
