<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove attachment: DELETE /v3/computers-inventory/{id}/attachments/{attachmentId}.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class DeleteComputerInventoryAttachmentV3Request extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected int|string $attachmentId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/computers-inventory/'.Path::segment((string) $this->id).'/attachments/'.Path::segment((string) $this->attachmentId);
    }
}
