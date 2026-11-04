<?php

namespace spkm\Jamf\Classic\Requests\ComputerManagement;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer management information by mac address: GET /computermanagement/macaddress/{macaddress}.
 */
class FindComputerManagementByMacAddressRequest extends ClassicGetRequest
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
        return '/computermanagement/macaddress/'.Path::segment((string) $this->macaddress);
    }
}
