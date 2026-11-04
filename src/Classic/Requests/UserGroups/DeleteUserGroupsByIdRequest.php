<?php

namespace spkm\Jamf\Classic\Requests\UserGroups;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes user groups by id: DELETE /usergroups/id/{id}.
 */
class DeleteUserGroupsByIdRequest extends ClassicDeleteRequest
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
