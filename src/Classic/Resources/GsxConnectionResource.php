<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\GsxConnection\FindGSXConnectionRequest;
use spkm\Jamf\Classic\Requests\GsxConnection\UpdateGSXConnectionRequest;

/**
 * The gsxconnection endpoints of the Classic API, from Jamf::classic()->gsxConnection().
 */
class GsxConnectionResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindGSXConnectionRequest;
    }

    /**
     * Finds the Jamf Pro GSX connection information: GET /gsxconnection.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findGSXConnection(array $options = []): Collection
    {
        return $this->fetch(new FindGSXConnectionRequest($options));
    }

    /**
     * Updates the Jamf Pro GSX connection information: PUT /gsxconnection.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <gsx_connection>), or the XML itself.
     */
    public function updateGSXConnection(array|string $record = []): mixed
    {
        return $this->fetch(new UpdateGSXConnectionRequest($record));
    }
}
