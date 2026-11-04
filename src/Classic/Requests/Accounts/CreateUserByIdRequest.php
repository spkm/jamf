<?php

namespace spkm\Jamf\Classic\Requests\Accounts;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new user by id: POST /accounts/userid/{id}.
 *
 * You cannot create an LDAP account or assign a password with a POST.
 */
class CreateUserByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'account';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <account>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/accounts/userid/'.Path::segment((string) $this->id);
    }
}
