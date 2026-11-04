<?php

namespace spkm\Jamf\Classic\Requests\ComputerApplications;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer applications by name and version: GET /computerapplications/application/{application}/version/{version}.
 *
 * Version may be specified using the same format as the general search in Jamf Pro. For example,
 * /computerapplications/application/Safari.app/version/9*
 */
class FindComputerApplicationByNameAndVersionRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $application, protected string $version, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerapplications/application/'.Path::segment((string) $this->application).'/version/'.Path::segment((string) $this->version);
    }
}
