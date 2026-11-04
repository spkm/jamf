<?php

namespace spkm\Jamf\Classic\Requests\ComputerApplications;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer applications by name: GET /computerapplications/application/{application}.
 *
 * Name may be specified using the same format as the general search in Jamf Pro. For example,
 * /computerapplications/application/Safari*
 */
class FindComputerApplicationsByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $application, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerapplications/application/'.Path::segment((string) $this->application);
    }
}
