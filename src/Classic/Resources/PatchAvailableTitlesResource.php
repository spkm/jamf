<?php

namespace spkm\Jamf\Classic\Resources;

use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\PatchAvailableTitles\FindAvailableTitlesBySourceIdRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The patchavailabletitles endpoints of the Classic API, from Jamf::classic()->patchAvailableTitles().
 *
 * @extends BaseResource<never>
 */
class PatchAvailableTitlesResource extends BaseResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Finds all available title from a source by Id: GET /patchavailabletitles/sourceid/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findAvailableTitlesBySourceId(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindAvailableTitlesBySourceIdRequest($id, $options));
    }
}
