<?php

namespace spkm\Jamf\Classic\Requests\Buildings;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds buildings by name: GET /buildings/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindBuildingsByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/buildings/name/'.Path::segment((string) $this->name);
    }
}
