<?php

namespace spkm\Jamf\Auth;

use Saloon\Http\Response;

/**
 * A request that exchanges credentials for a bearer token. It needs no token itself, and the connector never
 * fetches one for it.
 */
interface TokenRequest
{
    /**
     * The token in Jamf's answer and when it expires (a Unix timestamp).
     *
     * @return array{token: string, expires_at: int}
     */
    public function tokenFrom(Response $response): array;
}
