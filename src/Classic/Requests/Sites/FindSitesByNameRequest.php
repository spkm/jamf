<?php

namespace spkm\Jamf\Classic\Requests\Sites;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds sites by name: GET /sites/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindSitesByNameRequest extends ClassicGetRequest
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
        return '/sites/name/'.Path::segment((string) $this->name);
    }
}
