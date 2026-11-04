<?php

namespace spkm\Jamf\Classic\Resources;

use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ComputerApplicationUsage\FindComputerApplicationUsageByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerApplicationUsage\FindComputerApplicationUsageByMacAddressRequest;
use spkm\Jamf\Classic\Requests\ComputerApplicationUsage\FindComputerApplicationUsageByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerApplicationUsage\FindComputerApplicationUsageBySerialRequest;
use spkm\Jamf\Classic\Requests\ComputerApplicationUsage\FindComputerApplicationUsageByUDIDRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The computerapplicationusage endpoints of the Classic API, from Jamf::classic()->computerApplicationUsage().
 *
 * @extends BaseResource<never>
 */
class ComputerApplicationUsageResource extends BaseResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Finds computer application usage by computer id: GET /computerapplicationusage/id/{id}/{start_date}_{end_date}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerApplicationUsageById(int|string $id, string $startDate, string $endDate, array $options = []): mixed
    {
        return $this->fetch(new FindComputerApplicationUsageByIdRequest($id, $startDate, $endDate, $options));
    }

    /**
     * Finds computer application usage by computer mac address: GET
     * /computerapplicationusage/macaddress/{macaddress}/{start_date}_{end_date}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerApplicationUsageByMacAddress(string $macaddress, string $startDate, string $endDate, array $options = []): mixed
    {
        return $this->fetch(new FindComputerApplicationUsageByMacAddressRequest($macaddress, $startDate, $endDate, $options));
    }

    /**
     * Finds computer application usage by computer name: GET
     * /computerapplicationusage/name/{name}/{start_date}_{end_date}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerApplicationUsageByName(string $name, string $startDate, string $endDate, array $options = []): mixed
    {
        return $this->fetch(new FindComputerApplicationUsageByNameRequest($name, $startDate, $endDate, $options));
    }

    /**
     * Finds computer application usage by computer serial number: GET
     * /computerapplicationusage/serialnumber/{serialnumber}/{start_date}_{end_date}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerApplicationUsageBySerial(string $serialnumber, string $startDate, string $endDate, array $options = []): mixed
    {
        return $this->fetch(new FindComputerApplicationUsageBySerialRequest($serialnumber, $startDate, $endDate, $options));
    }

    /**
     * Finds computer application usage by computer UDID: GET
     * /computerapplicationusage/udid/{udid}/{start_date}_{end_date}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerApplicationUsageByUDID(string $udid, string $startDate, string $endDate, array $options = []): mixed
    {
        return $this->fetch(new FindComputerApplicationUsageByUDIDRequest($udid, $startDate, $endDate, $options));
    }
}
