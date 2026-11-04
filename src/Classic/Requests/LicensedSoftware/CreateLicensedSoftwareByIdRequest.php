<?php

namespace spkm\Jamf\Classic\Requests\LicensedSoftware;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new computer command by id: POST /licensedsoftware/id/{id}.
 *
 * Matching computers are derived, thus they cannot be set with POST.
 */
class CreateLicensedSoftwareByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'licensed_software';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <licensed_software>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/licensedsoftware/id/'.Path::segment((string) $this->id);
    }
}
