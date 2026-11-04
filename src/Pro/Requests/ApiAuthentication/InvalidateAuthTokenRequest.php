<?php

namespace spkm\Jamf\Pro\Requests\ApiAuthentication;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Invalidate current token: POST /auth/invalidateToken.
 *
 * Invalidates current token
 *
 * @deprecated Jamf deprecated this endpoint on 2020-06-01.
 */
class InvalidateAuthTokenRequest extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/auth/invalidateToken';
    }
}
