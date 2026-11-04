<?php

namespace spkm\Jamf\Classic\Requests\UserGroups;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates user groups by id: PUT /usergroups/id/{id}.
 *
 * PUT also works with a name. One or more users can be added by using instead of . One or more users can be deleted
 * by using instead of
 */
class UpdateUserGroupsByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
