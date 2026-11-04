<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified Computer record: DELETE /v3/computers-inventory/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class DeleteComputerInventoryV3Request extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/computers-inventory/'.Path::segment((string) $this->id);
    }
}
