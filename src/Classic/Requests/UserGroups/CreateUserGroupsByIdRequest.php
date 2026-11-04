<?php

namespace spkm\Jamf\Classic\Requests\UserGroups;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates user groups by id: POST /usergroups/id/{id}.
 */
class CreateUserGroupsByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'user_group';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <user_group>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/usergroups/id/'.Path::segment((string) $this->id);
    }
}
