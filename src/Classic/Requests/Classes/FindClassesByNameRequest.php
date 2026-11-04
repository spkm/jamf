<?php

namespace spkm\Jamf\Classic\Requests\Classes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds classes by name: GET /classes/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindClassesByNameRequest extends ClassicGetRequest
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
        return '/classes/name/'.Path::segment((string) $this->name);
    }
}
