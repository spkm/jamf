<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\InventoryInformation;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\InventoryInformation\GetInventoryInformationV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The inventory-information endpoints of the Jamf Pro API, from Jamf::inventoryInformation().
 *
 * @extends BaseResource<Data>
 */
class InventoryInformationResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get statistics about managed/unmanaged devices and computers in the inventory: GET /v1/inventory-information.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getInventoryInformationV1(array $options = []): ?InventoryInformation
    {
        return $this->fetch(new GetInventoryInformationV1Request($options));
    }
}
