<?php

namespace spkm\Jamf\Classic\Requests\Accounts;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new group by id: POST /accounts/groupid/{id}.
 *
 * You cannot create an LDAP group with a POST.
 */
class CreateGroupByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'group';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <group>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/accounts/groupid/'.Path::segment((string) $this->id);
    }
}
