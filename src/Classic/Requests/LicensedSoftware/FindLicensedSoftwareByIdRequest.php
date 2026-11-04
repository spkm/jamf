<?php

namespace spkm\Jamf\Classic\Requests\LicensedSoftware;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds licensed software by id: GET /licensedsoftware/id/{id}.
 */
class FindLicensedSoftwareByIdRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/licensedsoftware/id/'.Path::segment((string) $this->id);
    }
}
