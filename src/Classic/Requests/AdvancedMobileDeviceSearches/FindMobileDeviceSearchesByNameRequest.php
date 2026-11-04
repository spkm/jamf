<?php

namespace spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device searches by name: GET /advancedmobiledevicesearches/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindMobileDeviceSearchesByNameRequest extends ClassicGetRequest
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
        return '/advancedmobiledevicesearches/name/'.Path::segment((string) $this->name);
    }
}
