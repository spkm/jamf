<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\DistributionPoints\CreateDistributionPointByIdRequest;
use spkm\Jamf\Classic\Requests\DistributionPoints\DeleteDistributionPointByIdRequest;
use spkm\Jamf\Classic\Requests\DistributionPoints\FindDistributionPointsByIdRequest;
use spkm\Jamf\Classic\Requests\DistributionPoints\FindDistributionPointsByNameRequest;
use spkm\Jamf\Classic\Requests\DistributionPoints\FindDistributionPointsRequest;
use spkm\Jamf\Classic\Requests\DistributionPoints\UpdateDistributionPointByIdRequest;

/**
 * The distributionpoints endpoints of the Classic API, from Jamf::classic()->distributionPoints().
 */
class DistributionPointsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindDistributionPointsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindDistributionPointsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateDistributionPointByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateDistributionPointByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteDistributionPointByIdRequest($id);
    }

    /**
     * Creates a new distribution point by id: POST /distributionpoints/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <distribution_point>), or the XML itself.
     */
    public function createDistributionPointById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateDistributionPointByIdRequest($id, $record));
    }

    /**
     * Deletes a distribution point by id: DELETE /distributionpoints/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteDistributionPointById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteDistributionPointByIdRequest($id, $options));
    }

    /**
     * Finds all distribution points: GET /distributionpoints.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findDistributionPoints(array $options = []): Collection
    {
        return $this->fetch(new FindDistributionPointsRequest($options));
    }

    /**
     * Finds distribution points by id: GET /distributionpoints/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findDistributionPointsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindDistributionPointsByIdRequest($id, $options));
    }

    /**
     * Finds distribution points by name: GET /distributionpoints/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findDistributionPointsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindDistributionPointsByNameRequest($name, $options));
    }

    /**
     * Updates an existing distribution point by id: PUT /distributionpoints/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <distribution_point>), or the XML itself.
     */
    public function updateDistributionPointById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateDistributionPointByIdRequest($id, $record));
    }
}
