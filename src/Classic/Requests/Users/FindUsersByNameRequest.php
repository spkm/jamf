<?php

namespace spkm\Jamf\Classic\Requests\Users;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds users by name: GET /users/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindUsersByNameRequest extends ClassicGetRequest
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
        return '/users/name/'.Path::segment((string) $this->name);
    }
}
