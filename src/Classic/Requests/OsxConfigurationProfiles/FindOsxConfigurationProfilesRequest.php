<?php

namespace spkm\Jamf\Classic\Requests\OsxConfigurationProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all OS X configuration profiles: GET /osxconfigurationprofiles.
 */
class FindOsxConfigurationProfilesRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/osxconfigurationprofiles';
    }
}
