<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified Computer record: DELETE /v4/computers-inventory/{id}.
 */
class DeleteComputerInventoryV4Request extends DeleteRequest
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
        return '/v4/computers-inventory/'.Path::segment((string) $this->id);
    }
}
