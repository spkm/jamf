<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\DirectoryBindings\CreateDirectoryBindingByIdRequest;
use spkm\Jamf\Classic\Requests\DirectoryBindings\DeleteDirectoryBindingByIdRequest;
use spkm\Jamf\Classic\Requests\DirectoryBindings\FindDirectoryBindingsByIdRequest;
use spkm\Jamf\Classic\Requests\DirectoryBindings\FindDirectoryBindingsByNameRequest;
use spkm\Jamf\Classic\Requests\DirectoryBindings\FindDirectoryBindingsRequest;
use spkm\Jamf\Classic\Requests\DirectoryBindings\UpdateDirectoryBindingByIdRequest;

/**
 * The directorybindings endpoints of the Classic API, from Jamf::classic()->directoryBindings().
 */
class DirectoryBindingsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindDirectoryBindingsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindDirectoryBindingsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateDirectoryBindingByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateDirectoryBindingByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteDirectoryBindingByIdRequest($id);
    }

    /**
     * Creates a new directory binding by id: POST /directorybindings/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <directory_binding>), or the XML itself.
     */
    public function createDirectoryBindingById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateDirectoryBindingByIdRequest($id, $record));
    }

    /**
     * Deletes a directory binding by id: DELETE /directorybindings/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteDirectoryBindingById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteDirectoryBindingByIdRequest($id, $options));
    }

    /**
     * Finds all directory bindings: GET /directorybindings.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findDirectoryBindings(array $options = []): Collection
    {
        return $this->fetch(new FindDirectoryBindingsRequest($options));
    }

    /**
     * Finds directory bindings by id: GET /directorybindings/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findDirectoryBindingsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindDirectoryBindingsByIdRequest($id, $options));
    }

    /**
     * Finds directory bindings by name: GET /directorybindings/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findDirectoryBindingsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindDirectoryBindingsByNameRequest($name, $options));
    }

    /**
     * Updates an existing directory binding by id: PUT /directorybindings/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <directory_binding>), or the XML itself.
     */
    public function updateDirectoryBindingById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateDirectoryBindingByIdRequest($id, $record));
    }
}
