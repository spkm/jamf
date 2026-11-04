<?php

namespace spkm\Jamf\Classic\Requests\Accounts;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds users by name: GET /accounts/username/{name}.
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
        return '/accounts/username/'.Path::segment((string) $this->name);
    }
}
