<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceConfigurationProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for a mobile device configuration profile: GET /mobiledeviceconfigurationprofiles/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a mobile device configuration specified with the
 * {id} parameter. Lookup by name is also supported. For example,
 * /mobiledeviceconfigurationprofiles/id/3/subset/General&Scope or
 * /mobiledeviceconfigurationprofiles/name/MyCP/subset/Scope.
 */
class FindMobileDeviceConfigurationProfilesByIdSubsetRequest extends ClassicGetRequest
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
        return '/mobiledeviceconfigurationprofiles/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
