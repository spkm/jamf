<?php

namespace spkm\Jamf\Classic\Requests\ComputerHistory;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer history by mac address: GET /computerhistory/macaddress/{macaddress}.
 */
class FindComputerHistoryByMacAddressRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $macaddress, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerhistory/macaddress/'.Path::segment((string) $this->macaddress);
    }
}
