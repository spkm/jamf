<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceEnrollmentProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for an enrollment profile: GET /mobiledeviceenrollmentprofiles/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for an enrollment profile specified with the {id}
 * parameter. Lookup by name and invitation are also supported. For example,
 * /mobiledeviceenrollmentprofiles/id/3/subset/General&Scope or
 * /mobiledeviceenrollmentprofiles/name/myProfile/subset/Scope.
 */
class FindMobileDeviceEnrollmentProfilesByIdSubsetRequest extends ClassicGetRequest
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
        return '/mobiledeviceenrollmentprofiles/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
