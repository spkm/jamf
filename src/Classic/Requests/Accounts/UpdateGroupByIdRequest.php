<?php

namespace spkm\Jamf\Classic\Requests\Accounts;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing group by id: PUT /accounts/groupid/{id}.
 *
 * You cannot change information for an LDAP group with a PUT.
 */
class UpdateGroupByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
