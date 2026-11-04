<?php

namespace spkm\Jamf\Classic\Requests\Computers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds the first computer with the given name: GET /computers/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-02-11.
 */
class FindComputersByNameRequest extends ClassicGetRequest
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
        return '/computers/name/'.Path::segment((string) $this->name);
    }
}
