<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Download attachment file: GET /v1/computers-inventory/{id}/attachments/{attachmentId}.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class GetComputerInventoryAttachmentV1Request extends GetRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'text/plain';

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected int|string $attachmentId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computers-inventory/'.Path::segment((string) $this->id).'/attachments/'.Path::segment((string) $this->attachmentId);
    }
}
