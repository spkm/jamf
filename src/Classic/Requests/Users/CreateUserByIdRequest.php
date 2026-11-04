<?php

namespace spkm\Jamf\Classic\Requests\Users;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new user by id: POST /users/id/{id}.
 *
 * POST cannot be used to add computers, mobile devices, peripherals, vpp assignments to a user.
 */
class CreateUserByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'user';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <user>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/users/id/'.Path::segment((string) $this->id);
    }
}
