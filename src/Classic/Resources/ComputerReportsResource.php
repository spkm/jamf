<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\ComputerReports\FindComputeReportsByIdRequest;
use spkm\Jamf\Classic\Requests\ComputerReports\FindComputeReportsByNameRequest;
use spkm\Jamf\Classic\Requests\ComputerReports\FindComputerReportsRequest;

/**
 * The computerreports endpoints of the Classic API, from Jamf::classic()->computerReports().
 */
class ComputerReportsResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindComputerReportsRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindComputeReportsByIdRequest($id);
    }

    /**
     * Finds computer reports by id: GET /computerreports/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputeReportsById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindComputeReportsByIdRequest($id, $options));
    }

    /**
     * Finds computer reports by name: GET /computerreports/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findComputeReportsByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindComputeReportsByNameRequest($name, $options));
    }

    /**
     * Finds all computer reports: GET /computerreports.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findComputerReports(array $options = []): Collection
    {
        return $this->fetch(new FindComputerReportsRequest($options));
    }
}
