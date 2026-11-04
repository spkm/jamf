<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryFileVault;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return FileVault information for a specific computer: GET /v3/computers-inventory/{id}/filevault.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class GetComputerInventoryFilevaultV3Request extends GetRequest
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
        return '/v3/computers-inventory/'.Path::segment((string) $this->id).'/filevault';
    }
}
