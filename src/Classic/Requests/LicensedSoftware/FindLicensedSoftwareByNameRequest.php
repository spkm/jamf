<?php

namespace spkm\Jamf\Classic\Requests\LicensedSoftware;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds licensed software by name: GET /licensedsoftware/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindLicensedSoftwareByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/licensedsoftware/name/'.Path::segment((string) $this->name);
    }
}
