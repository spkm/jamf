<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\UploadRequest;
use spkm\Jamf\Support\Path;
use SplFileInfo;

/**
 * Upload attachment and assign to computer: POST /v1/computers-inventory/{id}/attachments.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class CreateComputerInventoryAttachmentsV1Request extends UploadRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = HrefResponse::class;

    /**
     * @param  string|resource|SplFileInfo  $file  The file: its contents, a stream, or a file on disk.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, mixed $file, ?string $filename = null, array $options = [])
    {
        $this->file = $file;
        $this->filename = $filename;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computers-inventory/'.Path::segment((string) $this->id).'/attachments';
    }
}
