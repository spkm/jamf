<?php

namespace spkm\Jamf\Classic\Requests\Scripts;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds scripts by name: GET /scripts/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindScriptsByNameRequest extends ClassicGetRequest
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
        return '/scripts/name/'.Path::segment((string) $this->name);
    }
}
