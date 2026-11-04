<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\LicensedSoftware\CreateLicensedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\LicensedSoftware\DeleteLicensedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\LicensedSoftware\FindLicensedSoftwareByIdRequest;
use spkm\Jamf\Classic\Requests\LicensedSoftware\FindLicensedSoftwareByNameRequest;
use spkm\Jamf\Classic\Requests\LicensedSoftware\FindLicensedSoftwareRequest;
use spkm\Jamf\Classic\Requests\LicensedSoftware\UpdateLicensedSoftwareByIdRequest;

/**
 * The licensedsoftware endpoints of the Classic API, from Jamf::classic()->licensedSoftware().
 */
class LicensedSoftwareResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindLicensedSoftwareRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindLicensedSoftwareByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateLicensedSoftwareByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateLicensedSoftwareByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteLicensedSoftwareByIdRequest($id);
    }

    /**
     * Creates a new computer command by id: POST /licensedsoftware/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <licensed_software>), or the XML itself.
     */
    public function createLicensedSoftwareById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateLicensedSoftwareByIdRequest($id, $record));
    }

    /**
     * Deletes a computer command by id: DELETE /licensedsoftware/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteLicensedSoftwareById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteLicensedSoftwareByIdRequest($id, $options));
    }

    /**
     * Finds all licensed software: GET /licensedsoftware.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findLicensedSoftware(array $options = []): Collection
    {
        return $this->fetch(new FindLicensedSoftwareRequest($options));
    }

    /**
     * Finds licensed software by id: GET /licensedsoftware/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findLicensedSoftwareById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindLicensedSoftwareByIdRequest($id, $options));
    }

    /**
     * Finds licensed software by name: GET /licensedsoftware/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findLicensedSoftwareByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindLicensedSoftwareByNameRequest($name, $options));
    }

    /**
     * Updates an existing computer command by id: PUT /licensedsoftware/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <licensed_software>), or the XML itself.
     */
    public function updateLicensedSoftwareById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateLicensedSoftwareByIdRequest($id, $record));
    }
}
