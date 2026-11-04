<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceApplications;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for a mobile device application: GET /mobiledeviceapplications/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a mobile device application specified with the {id}
 * parameter. Lookup by name or bundle id is also supported. For example,
 * /mobiledeviceapplications/id/3/subset/General or /mobiledeviceapplications/name/MyApp/subset/General&SelfService.
 */
class FindMobileDeviceAppsByIdSubsetRequest extends ClassicGetRequest
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
        return '/mobiledeviceapplications/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
