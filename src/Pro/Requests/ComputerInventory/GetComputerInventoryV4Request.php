<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryV4;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return General section of a Computer: GET /v4/computers-inventory/{id}.
 */
class GetComputerInventoryV4Request extends GetRequest
{
    protected ?string $dto = ComputerInventoryV4::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: section.
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
