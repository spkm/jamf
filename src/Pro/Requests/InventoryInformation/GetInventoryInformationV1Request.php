<?php

namespace spkm\Jamf\Pro\Requests\InventoryInformation;

use spkm\Jamf\Pro\Data\InventoryInformation;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get statistics about managed/unmanaged devices and computers in the inventory: GET /v1/inventory-information.
 *
 * Gets statistics about managed/unmanaged devices and computers in the inventory.
 */
class GetInventoryInformationV1Request extends GetRequest
{
    protected ?string $dto = InventoryInformation::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/inventory-information';
    }
}
