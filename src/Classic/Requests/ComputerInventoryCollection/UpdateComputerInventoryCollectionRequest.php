<?php

namespace spkm\Jamf\Classic\Requests\ComputerInventoryCollection;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;

/**
 * Updates the Jamf Pro computer inventory collection information: PUT /computerinventorycollection.
 */
class UpdateComputerInventoryCollectionRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'computer_inventory_collection';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <computer_inventory_collection>), or the XML itself.
     */
    public function __construct(array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/computerinventorycollection';
    }
}
