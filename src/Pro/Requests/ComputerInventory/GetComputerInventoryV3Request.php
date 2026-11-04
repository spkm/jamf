<?php

namespace spkm\Jamf\Pro\Requests\ComputerInventory;

use spkm\Jamf\Pro\Data\ComputerInventoryV3;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return General section of a Computer: GET /v3/computers-inventory/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class GetComputerInventoryV3Request extends GetRequest
{
    protected ?string $dto = ComputerInventoryV3::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: section.
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
