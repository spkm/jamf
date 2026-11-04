<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\ActiveUsersCount;
use spkm\Jamf\Pro\Data\ActiveUserSession;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\UserSessions\GetUserSessionsActiveV1Request;
use spkm\Jamf\Pro\Requests\UserSessions\GetUserSessionsCountV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The user-sessions endpoints of the Jamf Pro API, from Jamf::userSessions().
 *
 * @extends BaseResource<Data>
 */
class UserSessionsResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get active user sessions: GET /v1/user-sessions/active.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, ActiveUserSession>
     */
    public function getUserSessionsActiveV1(array $options = []): Collection
    {
        return $this->fetch(new GetUserSessionsActiveV1Request($options));
    }

    /**
     * Get count of active user sessions: GET /v1/user-sessions/count.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getUserSessionsCountV1(array $options = []): ?ActiveUsersCount
    {
        return $this->fetch(new GetUserSessionsCountV1Request($options));
    }
}
