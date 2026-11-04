<?php

namespace spkm\Jamf\Classic\Resources;

use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsByMacAddressRequest;
use spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsBySerialRequest;
use spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports\FindComputerHardwareSoftwareReportsByUDIDRequest;
use spkm\Jamf\Classic\Requests\ComputerHardwareSoftwareReports\FindComputerHistoryByIdSubsetRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The computerhardwaresoftwarereports endpoints of the Classic API, from Jamf::classic()->computerHardwareSoftwareReports().
 *
 * @extends BaseResource<never>
 */
class ComputerHardwareSoftwareReportsResource extends BaseResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Finds hardware/software reports by computer id: GET
     * /computerhardwaresoftwarereports/id/{id}/{start_date}_{end_date}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerHardwareSoftwareReportsById(int|string $id, string $startDate, string $endDate, array $options = []): mixed
    {
        return $this->fetch(new FindComputerHardwareSoftwareReportsByIdRequest($id, $startDate, $endDate, $options));
    }

    /**
     * Finds hardware/software reports by computer mac address: GET
     * /computerhardwaresoftwarereports/macaddress/{macaddress}/{start_date}_{end_date}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerHardwareSoftwareReportsByMacAddress(string $macaddress, string $startDate, string $endDate, array $options = []): mixed
    {
        return $this->fetch(new FindComputerHardwareSoftwareReportsByMacAddressRequest($macaddress, $startDate, $endDate, $options));
    }

    /**
     * Finds hardware/software reports by computer name: GET
     * /computerhardwaresoftwarereports/name/{name}/{start_date}_{end_date}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerHardwareSoftwareReportsByName(string $name, string $startDate, string $endDate, array $options = []): mixed
    {
        return $this->fetch(new FindComputerHardwareSoftwareReportsByNameRequest($name, $startDate, $endDate, $options));
    }

    /**
     * Finds hardware/software reports by computer serial number: GET
     * /computerhardwaresoftwarereports/serialnumber/{serialnumber}/{start_date}_{end_date}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerHardwareSoftwareReportsBySerial(string $serialnumber, string $startDate, string $endDate, array $options = []): mixed
    {
        return $this->fetch(new FindComputerHardwareSoftwareReportsBySerialRequest($serialnumber, $startDate, $endDate, $options));
    }

    /**
     * Finds hardware/software reports by computer UDID: GET
     * /computerhardwaresoftwarereports/udid/{udid}/{start_date}_{end_date}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerHardwareSoftwareReportsByUDID(string $udid, string $startDate, string $endDate, array $options = []): mixed
    {
        return $this->fetch(new FindComputerHardwareSoftwareReportsByUDIDRequest($udid, $startDate, $endDate, $options));
    }

    /**
     * Display subsets of information for computer hardware/software history: GET
     * /computerhardwaresoftwarereports/id/{id}/{start_date}_{end_date}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerHistoryByIdSubset(int|string $id, string $startDate, string $endDate, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindComputerHistoryByIdSubsetRequest($id, $startDate, $endDate, $subset, $options));
    }
}
