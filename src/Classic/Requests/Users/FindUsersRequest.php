<?php

namespace spkm\Jamf\Classic\Requests\Users;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all users: GET /users.
 */
class FindUsersRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/users';
    }
}
