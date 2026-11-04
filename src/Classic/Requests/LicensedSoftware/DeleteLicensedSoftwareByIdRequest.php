<?php

namespace spkm\Jamf\Classic\Requests\LicensedSoftware;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a computer command by id: DELETE /licensedsoftware/id/{id}.
 */
class DeleteLicensedSoftwareByIdRequest extends ClassicDeleteRequest
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
