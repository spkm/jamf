<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventory;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return General section of a Computer: GET /v1/computers-inventory/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class GetComputerInventoryV1Request extends GetRequest
{
    protected ?string $dto = ComputerInventory::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: section.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/computers-inventory/'.Path::segment((string) $this->id);
    }
}
