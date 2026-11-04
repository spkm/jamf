<?php

namespace spkm\Jamf\Pro\Requests\UserSessions;

use spkm\Jamf\Pro\Data\ActiveUsersCount;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get count of active user sessions: GET /v1/user-sessions/count.
 *
 * Returns the number of currently logged in users.
 */
class GetUserSessionsCountV1Request extends GetRequest
{
    protected ?string $dto = ActiveUsersCount::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/user-sessions/count';
    }
}
