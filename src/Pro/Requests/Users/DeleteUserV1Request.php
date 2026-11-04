<?php

namespace spkm\Jamf\Pro\Requests\Users;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a user from inventory: DELETE /v1/users/{id}.
 *
 * Deletes a user from the inventory by ID.
 */
class DeleteUserV1Request extends DeleteRequest
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
        return '/v1/users/'.Path::segment((string) $this->id);
    }
}
