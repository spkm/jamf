<?php

namespace spkm\Jamf\Pro\Requests\UserSessionPreview;

use JsonSerializable;
use spkm\Jamf\Pro\Data\Session;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update values in the User's current session: POST /user/updateSession.
 *
 * Updates values in the user's current session.
 */
class CreateUserUpdateSessionRequest extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = Session::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/user/updateSession';
    }
}
