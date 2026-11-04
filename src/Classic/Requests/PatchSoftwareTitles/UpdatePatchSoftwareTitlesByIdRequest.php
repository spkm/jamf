<?php

namespace spkm\Jamf\Classic\Requests\PatchSoftwareTitles;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates a patch software title by id: PUT /patchsoftwaretitles/id/{id}.
 *
 * You can PUT using the resource URLs with parameters of {id}.
 */
class UpdatePatchSoftwareTitlesByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'patch_software_title';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <patch_software_title>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/patchsoftwaretitles/id/'.Path::segment((string) $this->id);
    }
}
