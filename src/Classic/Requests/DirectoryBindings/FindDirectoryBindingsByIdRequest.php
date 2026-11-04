<?php

namespace spkm\Jamf\Classic\Requests\DirectoryBindings;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds directory bindings by id: GET /directorybindings/id/{id}.
 */
class FindDirectoryBindingsByIdRequest extends ClassicGetRequest
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
