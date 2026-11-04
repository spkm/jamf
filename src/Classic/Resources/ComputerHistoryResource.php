<?php

namespace spkm\Jamf\Classic\Resources;

use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ComputerHistory\FindComputerHistoryByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerHistory\FindComputerHistoryByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\ComputerHistory\FindComputerHistoryByMacAddressRequest;
use spkm\Jamf\Classic\Requests\ComputerHistory\FindComputerHistoryByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerHistory\FindComputerHistoryBySerialNumberRequest;
use spkm\Jamf\Classic\Requests\ComputerHistory\FindComputerHistoryByUDIDRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The computerhistory endpoints of the Classic API, from Jamf::classic()->computerHistory().
 *
 * @extends BaseResource<never>
 */
class ComputerHistoryResource extends BaseResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Finds computer history by id: GET /computerhistory/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerHistoryById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindComputerHistoryByIdRequest($id, $options));
    }

    /**
     * Display subsets of information for a computer history: GET /computerhistory/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerHistoryByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindComputerHistoryByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Finds computer history by mac address: GET /computerhistory/macaddress/{macaddress}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerHistoryByMacAddress(string $macaddress, array $options = []): mixed
    {
        return $this->fetch(new FindComputerHistoryByMacAddressRequest($macaddress, $options));
    }

    /**
     * Finds computer history by name: GET /computerhistory/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerHistoryByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindComputerHistoryByNameRequest($name, $options));
    }

    /**
     * Finds computer history by serial number: GET /computerhistory/serialnumber/{serialnumber}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerHistoryBySerialNumber(string $serialnumber, array $options = []): mixed
    {
        return $this->fetch(new FindComputerHistoryBySerialNumberRequest($serialnumber, $options));
    }

    /**
     * Finds computer history by UDID: GET /computerhistory/udid/{udid}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerHistoryByUDID(string $udid, array $options = []): mixed
    {
        return $this->fetch(new FindComputerHistoryByUDIDRequest($udid, $options));
    }
}
