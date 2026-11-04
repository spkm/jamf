<?php

namespace spkm\Jamf\Classic\Resources;

use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ComputerApplications\FindComputerApplicationByNameAndVersionRequest;
use spkm\Jamf\Classic\Requests\ComputerApplications\FindComputerApplicationsByNameAndVersionAndInventoryRequest;
use spkm\Jamf\Classic\Requests\ComputerApplications\FindComputerApplicationsByNameInventoryRequest;
use spkm\Jamf\Classic\Requests\ComputerApplications\FindComputerApplicationsByNameRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The computerapplications endpoints of the Classic API, from Jamf::classic()->computerApplications().
 *
 * @extends BaseResource<never>
 */
class ComputerApplicationsResource extends BaseResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Finds computer applications by name and version: GET
     * /computerapplications/application/{application}/version/{version}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerApplicationByNameAndVersion(string $application, string $version, array $options = []): mixed
    {
        return $this->fetch(new FindComputerApplicationByNameAndVersionRequest($application, $version, $options));
    }

    /**
     * Finds computer applications by name: GET /computerapplications/application/{application}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerApplicationsByName(string $application, array $options = []): mixed
    {
        return $this->fetch(new FindComputerApplicationsByNameRequest($application, $options));
    }

    /**
     * Finds computer applications by name and version, and generates additional inventory display: GET
     * /computerapplications/application/{application}/version/{version}/inventory/{inventory}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerApplicationsByNameAndVersionAndInventory(string $application, string $version, string $inventory, array $options = []): mixed
    {
        return $this->fetch(new FindComputerApplicationsByNameAndVersionAndInventoryRequest($application, $version, $inventory, $options));
    }

    /**
     * Finds computer applications by name and generates additional inventory display: GET
     * /computerapplications/application/{application}/inventory/{inventory}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputerApplicationsByNameInventory(string $application, string $inventory, array $options = []): mixed
    {
        return $this->fetch(new FindComputerApplicationsByNameInventoryRequest($application, $inventory, $options));
    }
}
