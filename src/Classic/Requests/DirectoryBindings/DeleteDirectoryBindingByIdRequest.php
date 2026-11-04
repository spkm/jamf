<?php

namespace spkm\Jamf\Classic\Requests\DirectoryBindings;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a directory binding by id: DELETE /directorybindings/id/{id}.
 */
class DeleteDirectoryBindingByIdRequest extends ClassicDeleteRequest
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
        return '/directorybindings/id/'.Path::segment((string) $this->id);
    }
}
