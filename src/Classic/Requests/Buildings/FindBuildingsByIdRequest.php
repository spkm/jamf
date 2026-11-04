<?php

namespace spkm\Jamf\Classic\Requests\Buildings;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds buildings by id: GET /buildings/id/{id}.
 */
class FindBuildingsByIdRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/buildings/id/'.Path::segment((string) $this->id);
    }
}
