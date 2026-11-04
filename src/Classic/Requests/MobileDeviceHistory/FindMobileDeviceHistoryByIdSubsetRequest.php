<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceHistory;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for a mobile device history: GET /mobiledevicehistory/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a mobile device specified with the {id} parameter.
 * Lookup by name, UDID, serial number, or mac address are also supported. For example,
 * /mobiledevicehistory/id/3/subset/General&UserLocation&Applications or
 * /mobiledevicehistory/id/3/subset/General&Audits or /mobiledevicehistory/name/MyIPad/subset/General.
 */
class FindMobileDeviceHistoryByIdSubsetRequest extends ClassicGetRequest
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
        return '/mobiledevicehistory/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
