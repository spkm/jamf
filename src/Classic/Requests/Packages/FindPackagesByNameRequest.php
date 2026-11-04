<?php

namespace spkm\Jamf\Classic\Requests\Packages;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds packages by name: GET /packages/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindPackagesByNameRequest extends ClassicGetRequest
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
        return '/packages/name/'.Path::segment((string) $this->name);
    }
}
