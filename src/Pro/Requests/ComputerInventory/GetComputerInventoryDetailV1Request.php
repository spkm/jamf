<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventory;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return all sections of a computer: GET /v1/computers-inventory-detail/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class GetComputerInventoryDetailV1Request extends GetRequest
{
    protected ?string $dto = ComputerInventory::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computers-inventory-detail/'.Path::segment((string) $this->id);
    }
}
