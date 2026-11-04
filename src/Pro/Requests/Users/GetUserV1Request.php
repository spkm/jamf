<?php

namespace spkm\Jamf\Pro\Requests\Users;

use spkm\Jamf\Pro\Data\User;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a user by ID: GET /v1/users/{id}.
 *
 * Retrieves a single user by their ID.
 */
class GetUserV1Request extends GetRequest
{
    protected ?string $dto = User::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: platform.
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
