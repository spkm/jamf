<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\RemovableMacAddresses\CreateRemovableMacAddressByIdRequest;
use spkm\Jamf\Classic\Requests\RemovableMacAddresses\DeleteRemovableMacAddressByIdRequest;
use spkm\Jamf\Classic\Requests\RemovableMacAddresses\FindRemovableMacAddressesByIdRequest;
use spkm\Jamf\Classic\Requests\RemovableMacAddresses\FindRemovableMacAddressesByNameRequest;
use spkm\Jamf\Classic\Requests\RemovableMacAddresses\FindRemovableMacAddressesRequest;
use spkm\Jamf\Classic\Requests\RemovableMacAddresses\UpdateRemovableMacAddressByIdRequest;

/**
 * The removablemacaddresses endpoints of the Classic API, from Jamf::classic()->removableMacAddresses().
 */
class RemovableMacAddressesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindRemovableMacAddressesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindRemovableMacAddressesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateRemovableMacAddressByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateRemovableMacAddressByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteRemovableMacAddressByIdRequest($id);
    }

    /**
     * Creates a new removableMacAddress by id: POST /removablemacaddresses/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <removable_mac_address>), or the XML itself.
     */
    public function createRemovableMacAddressById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateRemovableMacAddressByIdRequest($id, $record));
    }

    /**
     * Deletes a removableMacAddress by id: DELETE /removablemacaddresses/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteRemovableMacAddressById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteRemovableMacAddressByIdRequest($id, $options));
    }

    /**
     * Finds all removablemacaddresses: GET /removablemacaddresses.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findRemovableMacAddresses(array $options = []): Collection
    {
        return $this->fetch(new FindRemovableMacAddressesRequest($options));
    }

    /**
     * Finds removablemacaddresses by id: GET /removablemacaddresses/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findRemovableMacAddressesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindRemovableMacAddressesByIdRequest($id, $options));
    }

    /**
     * Finds removablemacaddresses by name: GET /removablemacaddresses/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findRemovableMacAddressesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindRemovableMacAddressesByNameRequest($name, $options));
    }

    /**
     * Updates an existing removableMacAddress by id: PUT /removablemacaddresses/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <removable_mac_address>), or the XML itself.
     */
    public function updateRemovableMacAddressById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateRemovableMacAddressByIdRequest($id, $record));
    }
}
