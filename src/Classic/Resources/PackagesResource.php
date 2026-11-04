<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\Packages\CreatePackageByIdRequest;
use spkm\Jamf\Classic\Requests\Packages\DeletePackageByIdRequest;
use spkm\Jamf\Classic\Requests\Packages\FindPackagesByIdRequest;
use spkm\Jamf\Classic\Requests\Packages\FindPackagesByNameRequest;
use spkm\Jamf\Classic\Requests\Packages\FindPackagesRequest;
use spkm\Jamf\Classic\Requests\Packages\UpdatePackageByIdRequest;

/**
 * The packages endpoints of the Classic API, from Jamf::classic()->packages().
 */
class PackagesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindPackagesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindPackagesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreatePackageByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdatePackageByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeletePackageByIdRequest($id);
    }

    /**
     * Creates a new package by id: POST /packages/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <package>), or the XML itself.
     */
    public function createPackageById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreatePackageByIdRequest($id, $record));
    }

    /**
     * Deletes a package by id: DELETE /packages/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePackageById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePackageByIdRequest($id, $options));
    }

    /**
     * Finds all packages: GET /packages.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findPackages(array $options = []): Collection
    {
        return $this->fetch(new FindPackagesRequest($options));
    }

    /**
     * Finds packages by id: GET /packages/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPackagesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindPackagesByIdRequest($id, $options));
    }

    /**
     * Finds packages by name: GET /packages/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPackagesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindPackagesByNameRequest($name, $options));
    }

    /**
     * Updates an existing package by id: PUT /packages/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <package>), or the XML itself.
     */
    public function updatePackageById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdatePackageByIdRequest($id, $record));
    }
}
