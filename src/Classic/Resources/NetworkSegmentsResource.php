<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\NetworkSegments\CreateNetworkSegmentByIdRequest;
use spkm\Jamf\Classic\Requests\NetworkSegments\DeleteNetworkSegmentByIdRequest;
use spkm\Jamf\Classic\Requests\NetworkSegments\FindNetworkSegmentsByIdRequest;
use spkm\Jamf\Classic\Requests\NetworkSegments\FindNetworkSegmentsByNameRequest;
use spkm\Jamf\Classic\Requests\NetworkSegments\FindNetworkSegmentsRequest;
use spkm\Jamf\Classic\Requests\NetworkSegments\UpdateNetworkSegmentByIdRequest;

/**
 * The networksegments endpoints of the Classic API, from Jamf::classic()->networkSegments().
 */
class NetworkSegmentsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindNetworkSegmentsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindNetworkSegmentsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateNetworkSegmentByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateNetworkSegmentByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteNetworkSegmentByIdRequest($id);
    }

    /**
     * Creates a new network segment by id: POST /networksegments/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <network_segment>), or the XML itself.
     */
    public function createNetworkSegmentById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateNetworkSegmentByIdRequest($id, $record));
    }

    /**
     * Deletes a network segment by id: DELETE /networksegments/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteNetworkSegmentById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteNetworkSegmentByIdRequest($id, $options));
    }

    /**
     * Finds all network segments: GET /networksegments.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findNetworkSegments(array $options = []): Collection
    {
        return $this->fetch(new FindNetworkSegmentsRequest($options));
    }

    /**
     * Finds network segments by id: GET /networksegments/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findNetworkSegmentsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindNetworkSegmentsByIdRequest($id, $options));
    }

    /**
     * Finds network segments by name: GET /networksegments/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findNetworkSegmentsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindNetworkSegmentsByNameRequest($name, $options));
    }

    /**
     * Updates an existing network segment by id: PUT /networksegments/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <network_segment>), or the XML itself.
     */
    public function updateNetworkSegmentById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateNetworkSegmentByIdRequest($id, $record));
    }
}
