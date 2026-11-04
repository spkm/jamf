<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\Peripherals\CreatePeripheralByIdRequest;
use spkm\Jamf\Classic\Requests\Peripherals\DeletePeripheralByIdRequest;
use spkm\Jamf\Classic\Requests\Peripherals\FindPeripheralsByIdRequest;
use spkm\Jamf\Classic\Requests\Peripherals\FindPeripheralsByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\Peripherals\FindPeripheralsRequest;
use spkm\Jamf\Classic\Requests\Peripherals\UpdatePeripheralByIdRequest;

/**
 * The peripherals endpoints of the Classic API, from Jamf::classic()->peripherals().
 */
class PeripheralsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindPeripheralsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindPeripheralsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreatePeripheralByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdatePeripheralByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeletePeripheralByIdRequest($id);
    }

    /**
     * Creates a new peripheral by id: POST /peripherals/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <peripheral>), or the XML itself.
     */
    public function createPeripheralById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreatePeripheralByIdRequest($id, $record));
    }

    /**
     * Deletes a peripheral by id: DELETE /peripherals/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePeripheralById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePeripheralByIdRequest($id, $options));
    }

    /**
     * Finds all peripherals: GET /peripherals.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findPeripherals(array $options = []): Collection
    {
        return $this->fetch(new FindPeripheralsRequest($options));
    }

    /**
     * Finds peripherals by id: GET /peripherals/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPeripheralsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindPeripheralsByIdRequest($id, $options));
    }

    /**
     * Display subsets of information for a peripheral: GET /peripherals/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPeripheralsByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindPeripheralsByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Updates an existing peripheral by id: PUT /peripherals/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <peripheral>), or the XML itself.
     */
    public function updatePeripheralById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdatePeripheralByIdRequest($id, $record));
    }
}
