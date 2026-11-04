<?php

namespace spkm\Jamf\Classic\Requests\OsxConfigurationProfiles;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new OS X configuration profile by id: POST /osxconfigurationprofiles/id/{id}.
 */
class CreateOsxConfigurationProfileByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'os_x_configuration_profile';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <os_x_configuration_profile>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/osxconfigurationprofiles/id/'.Path::segment((string) $this->id);
    }
}
