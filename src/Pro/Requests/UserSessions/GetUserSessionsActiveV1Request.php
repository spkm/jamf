<?php

namespace spkm\Jamf\Pro\Requests\UserSessions;

use spkm\Jamf\Pro\Data\ActiveUserSession;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get active user sessions: GET /v1/user-sessions/active.
 *
 * Returns detailed information about currently logged in users.
 */
class GetUserSessionsActiveV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = ActiveUserSession::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/user-sessions/active';
    }
}
