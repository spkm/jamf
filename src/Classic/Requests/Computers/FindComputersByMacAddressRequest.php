<?php

namespace spkm\Jamf\Classic\Requests\Computers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computers by mac address: GET /computers/macaddress/{macaddress}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-02-11.
 */
class FindComputersByMacAddressRequest extends ClassicGetRequest
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
        return '/computers/macaddress/'.Path::segment((string) $this->macaddress);
    }
}
