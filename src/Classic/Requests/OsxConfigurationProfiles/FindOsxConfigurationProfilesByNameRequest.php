<?php

namespace spkm\Jamf\Classic\Requests\OsxConfigurationProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds OS X configuration profiles by name: GET /osxconfigurationprofiles/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindOsxConfigurationProfilesByNameRequest extends ClassicGetRequest
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
        return '/osxconfigurationprofiles/name/'.Path::segment((string) $this->name);
    }
}
