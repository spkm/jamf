<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\ComputerExtensionAttributes\CreateComputerextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerExtensionAttributes\DeleteComputerextensionattributeByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerExtensionAttributes\FindComputerextensionattributesByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerExtensionAttributes\FindComputerextensionattributesByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerExtensionAttributes\FindComputerextensionattributesRequest;
use spkm\Jamf\Classic\Requests\ComputerExtensionAttributes\UpdateComputerextensionattributeByIdRequest;

/**
 * The computerextensionattributes endpoints of the Classic API, from Jamf::classic()->computerExtensionAttributes().
 */
class ComputerExtensionAttributesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindComputerextensionattributesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindComputerextensionattributesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateComputerextensionattributeByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateComputerextensionattributeByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteComputerextensionattributeByIdRequest($id);
    }

    /**
     * Creates a new computer extension attribute by id: POST /computerextensionattributes/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <computer_extension_attribute>), or the XML itself.
     */
    public function createComputerextensionattributeById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateComputerextensionattributeByIdRequest($id, $record));
    }

    /**
     * Deletes a computer extension attribute by id: DELETE /computerextensionattributes/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerextensionattributeById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerextensionattributeByIdRequest($id, $options));
    }

    /**
     * Finds all computer extension attributes: GET /computerextensionattributes.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findComputerextensionattributes(array $options = []): Collection
    {
        return $this->fetch(new FindComputerextensionattributesRequest($options));
    }

    /**
     * Finds computer extension attributes by id: GET /computerextensionattributes/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerextensionattributesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindComputerextensionattributesByIdRequest($id, $options));
    }

    /**
     * Finds computer extension attributes by name: GET /computerextensionattributes/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerextensionattributesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindComputerextensionattributesByNameRequest($name, $options));
    }

    /**
     * Updates an existing computer extension attribute by id: PUT /computerextensionattributes/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <computer_extension_attribute>), or the XML itself.
     */
    public function updateComputerextensionattributeById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateComputerextensionattributeByIdRequest($id, $record));
    }
}
