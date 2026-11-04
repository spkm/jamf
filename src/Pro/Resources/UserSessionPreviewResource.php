<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\Account;
use spkm\Jamf\Pro\Data\Session;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\UserSessionPreview\CreateUserUpdateSessionRequest;
use spkm\Jamf\Pro\Requests\UserSessionPreview\GetUserRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The user-session-preview endpoints of the Jamf Pro API, from Jamf::userSessionPreview().
 *
 * @extends BaseResource<Data>
 */
class UserSessionPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Update values in the User's current session: POST /user/updateSession.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createUserUpdateSession(array|JsonSerializable $body = [], array $options = []): ?Session
    {
        return $this->fetch(new CreateUserUpdateSessionRequest($body, $options));
    }

    /**
     * Return all Jamf Pro user acounts: GET /user.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, Account>
     */
    public function getUser(array $options = []): Collection
    {
        return $this->fetch(new GetUserRequest($options));
    }
}
