<?php

namespace spkm\Jamf\Classic\Resources;

use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByIdPatchFilterRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByIdUsernameRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByIdUsernameSubsetRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByMacAddressRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementBySerialNumberRequest;
use spkm\Jamf\Classic\Requests\ComputerManagement\FindComputerManagementByUDIDRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The computermanagement endpoints of the Classic API, from Jamf::classic()->computerManagement().
 *
 * @extends BaseResource<never>
 */
class ComputerManagementResource extends BaseResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Finds computer management information by id: GET /computermanagement/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerManagementById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindComputerManagementByIdRequest($id, $options));
    }

    /**
     * Display patch management information for a computer and filter: GET
     * /computermanagement/id/{id}/patchfilter/{filter}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerManagementByIdPatchFilter(int|string $id, string $filter, array $options = []): mixed
    {
        return $this->fetch(new FindComputerManagementByIdPatchFilterRequest($id, $filter, $options));
    }

    /**
     * Display subsets of management information for a computer: GET /computermanagement/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerManagementByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindComputerManagementByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Display management information for a computer and username: GET
     * /computermanagement/id/{id}/username/{username}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerManagementByIdUsername(int|string $id, string $username, array $options = []): mixed
    {
        return $this->fetch(new FindComputerManagementByIdUsernameRequest($id, $username, $options));
    }

    /**
     * Display subsets of management information for a computer and username: GET
     * /computermanagement/id/{id}/username/{username}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerManagementByIdUsernameSubset(int|string $id, string $username, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindComputerManagementByIdUsernameSubsetRequest($id, $username, $subset, $options));
    }

    /**
     * Finds computer management information by mac address: GET /computermanagement/macaddress/{macaddress}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerManagementByMacAddress(string $macaddress, array $options = []): mixed
    {
        return $this->fetch(new FindComputerManagementByMacAddressRequest($macaddress, $options));
    }

    /**
     * Finds computer management information by name: GET /computermanagement/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerManagementByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindComputerManagementByNameRequest($name, $options));
    }

    /**
     * Finds computer management information by serial number: GET /computermanagement/serialnumber/{serialnumber}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerManagementBySerialNumber(string $serialnumber, array $options = []): mixed
    {
        return $this->fetch(new FindComputerManagementBySerialNumberRequest($serialnumber, $options));
    }

    /**
     * Finds computer management information by UDID: GET /computermanagement/udid/{udid}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerManagementByUDID(string $udid, array $options = []): mixed
    {
        return $this->fetch(new FindComputerManagementByUDIDRequest($udid, $options));
    }
}
