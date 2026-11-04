<?php

namespace spkm\Jamf\Classic\Requests\Accounts;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing user by id: PUT /accounts/userid/{id}.
 *
 * You cannot change information in an LDAP account or change a password with a PUT.
 */
class UpdateUserByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
