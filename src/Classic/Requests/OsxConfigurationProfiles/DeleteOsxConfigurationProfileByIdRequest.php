<?php

namespace spkm\Jamf\Classic\Requests\OsxConfigurationProfiles;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a OS X configuration profile by id: DELETE /osxconfigurationprofiles/id/{id}.
 */
class DeleteOsxConfigurationProfileByIdRequest extends ClassicDeleteRequest
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
