<?php

namespace spkm\Jamf\Classic\Requests\Packages;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a package by id: DELETE /packages/id/{id}.
 */
class DeletePackageByIdRequest extends ClassicDeleteRequest
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
        return '/packages/id/'.Path::segment((string) $this->id);
    }
}
