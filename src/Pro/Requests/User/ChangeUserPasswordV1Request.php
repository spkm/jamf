<?php

namespace spkm\Jamf\Pro\Requests\User;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Changes the user account password: POST /v1/user/change-password.
 *
 * Changes the account password for a currently authenticated user.
 */
class ChangeUserPasswordV1Request extends WriteRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/user/change-password';
    }
}
