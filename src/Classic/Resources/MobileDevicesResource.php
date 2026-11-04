<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\CreateMobileDeviceByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\DeleteMobileDeviceByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesByMacAddressRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesBySerialNumberRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesByUDIDRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\FindMobileDevicesRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\MatchMobileDevicesRequest;
use spkm\Jamf\Classic\Requests\MobileDevices\UpdateMobileDeviceByIdRequest;

/**
 * The mobiledevices endpoints of the Classic API, from Jamf::classic()->mobileDevices().
 */
class MobileDevicesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindMobileDevicesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindMobileDevicesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateMobileDeviceByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateMobileDeviceByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteMobileDeviceByIdRequest($id);
    }

    /**
     * Creates a new mobile device by id: POST /mobiledevices/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device>), or the XML itself.
     */
    public function createMobileDeviceById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateMobileDeviceByIdRequest($id, $record));
    }

    /**
     * Deletes a mobile device by id: DELETE /mobiledevices/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMobileDeviceById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteMobileDeviceByIdRequest($id, $options));
    }

    /**
     * Finds all mobile devices: GET /mobiledevices.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findMobileDevices(array $options = []): Collection
    {
        return $this->fetch(new FindMobileDevicesRequest($options));
    }

    /**
     * Finds mobile devices by id: GET /mobiledevices/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDevicesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDevicesByIdRequest($id, $options));
    }

    /**
     * Display subsets of information for a mobile device: GET /mobiledevices/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDevicesByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDevicesByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Finds mobile devices by wifi mac address: GET /mobiledevices/macaddress/{macaddress}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDevicesByMacAddress(string $macaddress, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDevicesByMacAddressRequest($macaddress, $options));
    }

    /**
     * Finds mobile devices by name: GET /mobiledevices/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDevicesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDevicesByNameRequest($name, $options));
    }

    /**
     * Finds mobile devices by serial number: GET /mobiledevices/serialnumber/{serialnumber}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDevicesBySerialNumber(string $serialnumber, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDevicesBySerialNumberRequest($serialnumber, $options));
    }

    /**
     * Finds mobile devices by UDID: GET /mobiledevices/udid/{udid}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDevicesByUDID(string $udid, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDevicesByUDIDRequest($udid, $options));
    }

    /**
     * Searches for mobile devices that match the provided parameter: GET /mobiledevices/match/{match}.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function matchMobileDevices(string $match, array $options = []): Collection
    {
        return $this->fetch(new MatchMobileDevicesRequest($match, $options));
    }

    /**
     * Updates an existing mobile device by id: PUT /mobiledevices/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <mobile_device>), or the XML itself.
     */
    public function updateMobileDeviceById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateMobileDeviceByIdRequest($id, $record));
    }
}
