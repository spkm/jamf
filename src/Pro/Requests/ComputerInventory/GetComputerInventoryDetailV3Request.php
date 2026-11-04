<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryV3;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return all sections of a computer: GET /v3/computers-inventory-detail/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class GetComputerInventoryDetailV3Request extends GetRequest
{
    protected ?string $dto = ComputerInventoryV3::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/computers-inventory-detail/'.Path::segment((string) $this->id);
    }
}
