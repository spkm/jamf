<?php

namespace spkm\Jamf\Classic\Requests\Users;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing user by id: PUT /users/id/{id}.
 *
 * PUT cannot be used to add computers, mobile devices, peripherals, vpp assignments to a user.
 */
class UpdateUserByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
