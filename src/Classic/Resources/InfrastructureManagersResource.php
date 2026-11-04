<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\InfrastructureManagers\FindInfrastructureManagerByIdRequest;
use spkm\Jamf\Classic\Requests\InfrastructureManagers\FindInfrastructureManagerRequest;
use spkm\Jamf\Classic\Requests\InfrastructureManagers\UpdateInfrastructureManagerByIdRequest;

/**
 * The infrastructuremanager endpoints of the Classic API, from Jamf::classic()->infrastructureManagers().
 */
class InfrastructureManagersResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindInfrastructureManagerRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindInfrastructureManagerByIdRequest($id);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateInfrastructureManagerByIdRequest($id, $record);
    }

    /**
     * Find all Infrastructure Managers: GET /infrastructuremanager.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findInfrastructureManager(array $options = []): Collection
    {
        return $this->fetch(new FindInfrastructureManagerRequest($options));
    }

    /**
     * Finds infrastructure manager by id: GET /infrastructuremanager/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findInfrastructureManagerById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindInfrastructureManagerByIdRequest($id, $options));
    }

    /**
     * Updates an existing infrastructure manager by id: PUT /infrastructuremanager/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <infrastructure_manager>), or the XML itself.
     */
    public function updateInfrastructureManagerById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateInfrastructureManagerByIdRequest($id, $record));
    }
}
