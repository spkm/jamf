<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryFileVault;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return FileVault information for a specific computer: GET /v2/computers-inventory/{id}/filevault.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-11-06.
 */
class GetComputerInventoryFilevaultV2Request extends GetRequest
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
        return '/v2/computers-inventory/'.Path::segment((string) $this->id).'/filevault';
    }
}
