<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return all sections of a computer: GET /v2/computers-inventory-detail/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-11-06.
 */
class GetComputerInventoryDetailV2Request extends GetRequest
{
    protected ?string $dto = ComputerInventoryV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/computers-inventory-detail/'.Path::segment((string) $this->id);
    }
}
