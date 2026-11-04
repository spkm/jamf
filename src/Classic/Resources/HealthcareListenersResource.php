<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\HealthcareListeners\FindHealthcareListenerRequest;
use spkm\Jamf\Classic\Requests\HealthcareListeners\FindHealthcareListenersByIdRequest;
use spkm\Jamf\Classic\Requests\HealthcareListeners\UpdateHealthCareListenerByIdRequest;

/**
 * The healthcarelistener endpoints of the Classic API, from Jamf::classic()->healthcareListeners().
 */
class HealthcareListenersResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindHealthcareListenerRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindHealthcareListenersByIdRequest($id);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateHealthCareListenerByIdRequest($id, $record);
    }

    /**
     * Find all Healthcare Listener: GET /healthcarelistener.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findHealthcareListener(array $options = []): Collection
    {
        return $this->fetch(new FindHealthcareListenerRequest($options));
    }

    /**
     * Finds healthcare listener by id: GET /healthcarelistener/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findHealthcareListenersById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindHealthcareListenersByIdRequest($id, $options));
    }

    /**
     * Updates an existing healthcare listener by id: PUT /healthcarelistener/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <healthcare_listener>), or the XML itself.
     */
    public function updateHealthCareListenerById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateHealthCareListenerByIdRequest($id, $record));
    }
}
