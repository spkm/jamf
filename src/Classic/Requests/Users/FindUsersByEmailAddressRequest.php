<?php

namespace spkm\Jamf\Classic\Requests\Users;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds users by email address: GET /users/email/{email}.
 *
 * Because email addresses may not be unique, this operation returns a list of users. You cannot PUT, POST, and DELETE
 * using this resource URL.
 */
class FindUsersByEmailAddressRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $email, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/users/email/'.Path::segment((string) $this->email);
    }
}
