<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\CreateMobileDeviceApplicationByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\DeleteMobileDeviceApplicationByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\FindMobileDeviceApplicationsByBundleIDandVersionRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\FindMobileDeviceApplicationsByBundleIDRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\FindMobileDeviceApplicationsByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\FindMobileDeviceApplicationsByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\FindMobileDeviceApplicationsRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\FindMobileDeviceAppsByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceApplications\UpdateMobileDeviceApplicationByIdRequest;

/**
 * The mobiledeviceapplications endpoints of the Classic API, from Jamf::classic()->mobileDeviceApplications().
 */
class MobileDeviceApplicationsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindMobileDeviceApplicationsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindMobileDeviceApplicationsByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateMobileDeviceApplicationByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateMobileDeviceApplicationByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteMobileDeviceApplicationByIdRequest($id);
    }

    /**
     * Creates a new mobile device application by id: POST /mobiledeviceapplications/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_application>), or the XML itself.
     */
    public function createMobileDeviceApplicationById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileDeviceApplicationByIdRequest($id, $record));
    }

    /**
     * Deletes a mobile device application by id: DELETE /mobiledeviceapplications/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDeviceApplicationById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDeviceApplicationByIdRequest($id, $options));
    }

    /**
     * Finds all mobile device applications: GET /mobiledeviceapplications.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findMobileDeviceApplications(array $options = []): Collection
    {
        return $this->fetch(new FindMobileDeviceApplicationsRequest($options));
    }

    /**
     * Finds mobile device applications by bundle ID: GET /mobiledeviceapplications/bundleid/{bundleid}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceApplicationsByBundleID(string $bundleid, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceApplicationsByBundleIDRequest($bundleid, $options));
    }

    /**
     * Finds mobile device applications by bundle ID and version: GET
     * /mobiledeviceapplications/bundleid/{bundleid}/version/{version}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceApplicationsByBundleIDandVersion(string $bundleid, string $version, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceApplicationsByBundleIDandVersionRequest($bundleid, $version, $options));
    }

    /**
     * Finds mobile device applications by id: GET /mobiledeviceapplications/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceApplicationsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceApplicationsByIdRequest($id, $options));
    }

    /**
     * Finds mobile device applications by name: GET /mobiledeviceapplications/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceApplicationsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceApplicationsByNameRequest($name, $options));
    }

    /**
     * Display subsets of information for a mobile device application: GET
     * /mobiledeviceapplications/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceAppsByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceAppsByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Updates an existing mobile device application by id: PUT /mobiledeviceapplications/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device_application>), or the XML itself.
     */
    public function updateMobileDeviceApplicationById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateMobileDeviceApplicationByIdRequest($id, $record));
    }
}
