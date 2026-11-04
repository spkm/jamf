<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove attachment: DELETE /v2/computers-inventory/{id}/attachments/{attachmentId}.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-11-06.
 */
class DeleteComputerInventoryAttachmentV2Request extends DeleteRequest
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
        return '/v2/computers-inventory/'.Path::segment((string) $this->id).'/attachments/'.Path::segment((string) $this->attachmentId);
    }
}
