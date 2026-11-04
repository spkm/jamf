<?php

namespace spkm\Jamf\Classic\Requests\OsxConfigurationProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for an OS X configuration profile: GET /osxconfigurationprofiles/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a configuration specified with the {id} parameter.
 * Lookup by name is also supported. For example, /osxconfigurationprofiles/id/3/subset/General&Scope or
 * /osxconfigurationprofiles/name/MyCP/subset/General.
 */
class FindOsxConfigurationProfilesByIdSubsetRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $subset, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/osxconfigurationprofiles/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
