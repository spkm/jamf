<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\DockItems\CreateDockItemByIdRequest;
use spkm\Jamf\Classic\Requests\DockItems\DeleteDockItemByIdRequest;
use spkm\Jamf\Classic\Requests\DockItems\FindDockItemsByIdRequest;
use spkm\Jamf\Classic\Requests\DockItems\FindDockItemsByNameRequest;
use spkm\Jamf\Classic\Requests\DockItems\FindDockItemsRequest;
use spkm\Jamf\Classic\Requests\DockItems\UpdateDockItemByIdRequest;

/**
 * The dockitems endpoints of the Classic API, from Jamf::classic()->dockItems().
 */
class DockItemsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindDockItemsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindDockItemsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateDockItemByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateDockItemByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteDockItemByIdRequest($id);
    }

    /**
     * Creates a new dock item by id: POST /dockitems/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <dock_item>), or the XML itself.
     */
    public function createDockItemById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateDockItemByIdRequest($id, $record));
    }

    /**
     * Deletes a dock item by id: DELETE /dockitems/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteDockItemById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteDockItemByIdRequest($id, $options));
    }

    /**
     * Finds all dock items: GET /dockitems.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findDockItems(array $options = []): Collection
    {
        return $this->fetch(new FindDockItemsRequest($options));
    }

    /**
     * Finds dock items by id: GET /dockitems/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findDockItemsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindDockItemsByIdRequest($id, $options));
    }

    /**
     * Finds dock items by name: GET /dockitems/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findDockItemsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindDockItemsByNameRequest($name, $options));
    }

    /**
     * Updates an existing dock item by id: PUT /dockitems/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <dock_item>), or the XML itself.
     */
    public function updateDockItemById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateDockItemByIdRequest($id, $record));
    }
}
