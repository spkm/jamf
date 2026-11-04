<?php

namespace spkm\Jamf\Classic\Requests\Users;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds users by id: GET /users/id/{id}.
 */
class FindUsersByIdRequest extends ClassicGetRequest
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
        return '/users/id/'.Path::segment((string) $this->id);
    }
}
