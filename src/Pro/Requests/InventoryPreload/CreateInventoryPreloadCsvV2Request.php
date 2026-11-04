<?php

namespace spkm\Jamf\Pro\Requests\InventoryPreload;

use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\UploadRequest;
use SplFileInfo;

/**
 * Create one or more new Inventory Preload records using CSV: POST /v2/inventory-preload/csv.
 */
class CreateInventoryPreloadCsvV2Request extends UploadRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = HrefResponse::class;

    /**
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(mixed $file, ?string $filename = null, array $options = [])
    {
        $this->file = $file;
        $this->filename = $filename;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/inventory-preload/csv';
    }
}
