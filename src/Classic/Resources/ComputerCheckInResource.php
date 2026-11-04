<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\ComputerCheckIn\FindComputerCheckinRequest;
use spkm\Jamf\Classic\Requests\ComputerCheckIn\UpdateComputerCheckinRequest;

/**
 * The computercheckin endpoints of the Classic API, from Jamf::classic()->computerCheckIn().
 */
class ComputerCheckInResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindComputerCheckinRequest;
    }

    /**
     * Finds the Jamf Pro computer checkin information: GET /computercheckin.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findComputerCheckin(array $options = []): Collection
    {
        return $this->fetch(new FindComputerCheckinRequest($options));
    }

    /**
     * Updates the Jamf Pro computer checkin information: PUT /computercheckin.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <computer_check_in>), or the XML itself.
     */
    public function updateComputerCheckin(array|string $record = []): mixed
    {
        return $this->fetch(new UpdateComputerCheckinRequest($record));
    }
}
