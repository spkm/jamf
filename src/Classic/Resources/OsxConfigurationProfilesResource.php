<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\CreateOsxConfigurationProfileByIdRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\DeleteOsxConfigurationProfileByIdRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\FindOsxConfigurationProfilesByIdRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\FindOsxConfigurationProfilesByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\FindOsxConfigurationProfilesByNameRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\FindOsxConfigurationProfilesRequest;
use spkm\Jamf\Classic\Requests\OsxConfigurationProfiles\UpdateOsxConfigurationProfileByIdRequest;

/**
 * The osxconfigurationprofiles endpoints of the Classic API, from Jamf::classic()->osxConfigurationProfiles().
 */
class OsxConfigurationProfilesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindOsxConfigurationProfilesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindOsxConfigurationProfilesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateOsxConfigurationProfileByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateOsxConfigurationProfileByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteOsxConfigurationProfileByIdRequest($id);
    }

    /**
     * Creates a new OS X configuration profile by id: POST /osxconfigurationprofiles/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <os_x_configuration_profile>), or the XML itself.
     */
    public function createOsxConfigurationProfileById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateOsxConfigurationProfileByIdRequest($id, $record));
    }

    /**
     * Deletes a OS X configuration profile by id: DELETE /osxconfigurationprofiles/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteOsxConfigurationProfileById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteOsxConfigurationProfileByIdRequest($id, $options));
    }

    /**
     * Finds all OS X configuration profiles: GET /osxconfigurationprofiles.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findOsxConfigurationProfiles(array $options = []): Collection
    {
        return $this->fetch(new FindOsxConfigurationProfilesRequest($options));
    }

    /**
     * Finds OS X configuration profiles by id: GET /osxconfigurationprofiles/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findOsxConfigurationProfilesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindOsxConfigurationProfilesByIdRequest($id, $options));
    }

    /**
     * Display subsets of information for an OS X configuration profile: GET
     * /osxconfigurationprofiles/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findOsxConfigurationProfilesByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindOsxConfigurationProfilesByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Finds OS X configuration profiles by name: GET /osxconfigurationprofiles/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findOsxConfigurationProfilesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindOsxConfigurationProfilesByNameRequest($name, $options));
    }

    /**
     * Updates an existing OS X configuration profile by id: PUT /osxconfigurationprofiles/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <os_x_configuration_profile>), or the XML itself.
     */
    public function updateOsxConfigurationProfileById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateOsxConfigurationProfileByIdRequest($id, $record));
    }
}
