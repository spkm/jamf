<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\ComputerInventoryCollection\FindcomputerinventorycollectionRequest;
use spkm\Jamf\Classic\Requests\ComputerInventoryCollection\UpdateComputerInventoryCollectionRequest;

/**
 * The computerinventorycollection endpoints of the Classic API, from Jamf::classic()->computerInventoryCollection().
 */
class ComputerInventoryCollectionResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindcomputerinventorycollectionRequest;
    }

    /**
     * Finds the Jamf Pro computer inventory collection information: GET /computerinventorycollection.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findcomputerinventorycollection(array $options = []): Collection
    {
        return $this->fetch(new FindcomputerinventorycollectionRequest($options));
    }

    /**
     * Updates the Jamf Pro computer inventory collection information: PUT /computerinventorycollection.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <computer_inventory_collection>), or the XML itself.
     */
    public function updateComputerInventoryCollection(array|string $record = []): mixed
    {
        return $this->fetch(new UpdateComputerInventoryCollectionRequest($record));
    }
}
