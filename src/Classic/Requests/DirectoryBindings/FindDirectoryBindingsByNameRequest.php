<?php

namespace spkm\Jamf\Classic\Requests\DirectoryBindings;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds directory bindings by name: GET /directorybindings/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindDirectoryBindingsByNameRequest extends ClassicGetRequest
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
        return '/directorybindings/name/'.Path::segment((string) $this->name);
    }
}
