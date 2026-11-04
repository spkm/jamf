<?php

namespace spkm\Jamf\Classic\Requests\UserGroups;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds user groups by id: GET /usergroups/id/{id}.
 */
class FindUserGroupsByIdRequest extends ClassicGetRequest
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
        return '/usergroups/id/'.Path::segment((string) $this->id);
    }
}
