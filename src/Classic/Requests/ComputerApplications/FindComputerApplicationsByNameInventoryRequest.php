<?php

namespace spkm\Jamf\Classic\Requests\ComputerApplications;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer applications by name and generates additional inventory display: GET /computerapplications/application/{application}/inventory/{inventory}.
 *
 * Inventory values may be displayed in addition to computer identification information. Use Default to view the same
 * fields as those checked for Inventory Display, otherwise list display fields separated by commas. For example,
 * computerapplications/application/Safari.app/inventory/HostName,Platform,Bar%20Code or
 * computerapplications/application/Safari.app/inventory/Default. This interface will substitute %20 for blank spaces.
 */
class FindComputerApplicationsByNameInventoryRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $application, protected string $inventory, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerapplications/application/'.Path::segment((string) $this->application).'/inventory/'.Path::segment((string) $this->inventory);
    }
}
