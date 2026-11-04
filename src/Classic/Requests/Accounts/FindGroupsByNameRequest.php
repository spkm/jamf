<?php

namespace spkm\Jamf\Classic\Requests\Accounts;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds groups by name: GET /accounts/groupname/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindGroupsByNameRequest extends ClassicGetRequest
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
        return '/accounts/groupname/'.Path::segment((string) $this->name);
    }
}
