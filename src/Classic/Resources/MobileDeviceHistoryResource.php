<?php

namespace spkm\Jamf\Classic\Resources;

use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\MobileDeviceHistory\FindMobileDeviceHistoryByIdRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceHistory\FindMobileDeviceHistoryByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceHistory\FindMobileDeviceHistoryByMacAddressRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceHistory\FindMobileDeviceHistoryByNameRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceHistory\FindMobileDeviceHistoryBySerialNumberRequest;
use spkm\Jamf\Classic\Requests\MobileDeviceHistory\FindMobileDeviceHistoryByUDIDRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The mobiledevicehistory endpoints of the Classic API, from Jamf::classic()->mobileDeviceHistory().
 *
 * @extends BaseResource<never>
 */
class MobileDeviceHistoryResource extends BaseResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Finds mobile device history by id: GET /mobiledevicehistory/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceHistoryById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceHistoryByIdRequest($id, $options));
    }

    /**
     * Display subsets of information for a mobile device history: GET /mobiledevicehistory/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceHistoryByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceHistoryByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Finds mobile device history by wifi mac address: GET /mobiledevicehistory/macaddress/{macaddress}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceHistoryByMacAddress(string $macaddress, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceHistoryByMacAddressRequest($macaddress, $options));
    }

    /**
     * Finds mobile device history by name: GET /mobiledevicehistory/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceHistoryByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceHistoryByNameRequest($name, $options));
    }

    /**
     * Finds mobile device history by serial number: GET /mobiledevicehistory/serialnumber/{serialnumber}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceHistoryBySerialNumber(string $serialnumber, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceHistoryBySerialNumberRequest($serialnumber, $options));
    }

    /**
     * Finds mobile device history by UDID: GET /mobiledevicehistory/udid/{udid}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findMobileDeviceHistoryByUDID(string $udid, array $options = []): mixed
    {
        return $this->fetch(new FindMobileDeviceHistoryByUDIDRequest($udid, $options));
    }
}
