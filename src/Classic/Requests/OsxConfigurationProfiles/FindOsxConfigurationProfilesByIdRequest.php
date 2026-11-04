<?php

namespace spkm\Jamf\Classic\Requests\OsxConfigurationProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds OS X configuration profiles by id: GET /osxconfigurationprofiles/id/{id}.
 */
class FindOsxConfigurationProfilesByIdRequest extends ClassicGetRequest
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
        return '/osxconfigurationprofiles/id/'.Path::segment((string) $this->id);
    }
}
