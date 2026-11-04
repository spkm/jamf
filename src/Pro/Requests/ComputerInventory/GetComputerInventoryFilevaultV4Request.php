<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryFileVault;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return FileVault information for a specific computer: GET /v4/computers-inventory/{id}/filevault.
 */
class GetComputerInventoryFilevaultV4Request extends GetRequest
{
    protected ?string $dto = ComputerInventoryFileVault::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v4/computers-inventory/'.Path::segment((string) $this->id).'/filevault';
    }
}
