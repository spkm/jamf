<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceProvisioningProfiles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for a mobile device provisioning profile: GET /mobiledeviceprovisioningprofiles/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a mobile device provisioning profile specified with
 * the {id} parameter. Lookup by name and UUID are also supported. For example,
 * /mobiledeviceprovisioningprofiles/id/3/subset/General.
 */
class FindMobileDeviceProvisioningProfileByIdSubsetRequest extends ClassicGetRequest
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
        return '/mobiledeviceprovisioningprofiles/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
