<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\PeripheralTypes\CreatePeripheralTypeByIdRequest;
use spkm\Jamf\Classic\Requests\PeripheralTypes\DeletePeripheralByIdRequest;
use spkm\Jamf\Classic\Requests\PeripheralTypes\FindPeripheralTypesByIdRequest;
use spkm\Jamf\Classic\Requests\PeripheralTypes\FindPeripheralTypesRequest;
use spkm\Jamf\Classic\Requests\PeripheralTypes\UpdatePeripheralTypeByIdRequest;

/**
 * The peripheraltypes endpoints of the Classic API, from Jamf::classic()->peripheralTypes().
 */
class PeripheralTypesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindPeripheralTypesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindPeripheralTypesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreatePeripheralTypeByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdatePeripheralTypeByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeletePeripheralByIdRequest($id);
    }

    /**
     * Creates a new peripheral by id: POST /peripheraltypes/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <peripheral_type>), or the XML itself.
     */
    public function createPeripheralTypeById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreatePeripheralTypeByIdRequest($id, $record));
    }

    /**
     * Deletes a peripheral by id: DELETE /peripheraltypes/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePeripheralById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePeripheralByIdRequest($id, $options));
    }

    /**
     * Finds all peripheral types: GET /peripheraltypes.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findPeripheralTypes(array $options = []): Collection
    {
        return $this->fetch(new FindPeripheralTypesRequest($options));
    }

    /**
     * Finds peripheral types by id: GET /peripheraltypes/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPeripheralTypesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindPeripheralTypesByIdRequest($id, $options));
    }

    /**
     * Updates an existing peripheral by id: PUT /peripheraltypes/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <peripheral_type>), or the XML itself.
     */
    public function updatePeripheralTypeById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdatePeripheralTypeByIdRequest($id, $record));
    }
}
