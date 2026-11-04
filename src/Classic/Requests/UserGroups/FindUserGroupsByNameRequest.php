<?php

namespace spkm\Jamf\Classic\Requests\UserGroups;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds user groups by name: GET /usergroups/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindUserGroupsByNameRequest extends ClassicGetRequest
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
        return '/usergroups/name/'.Path::segment((string) $this->name);
    }
}
