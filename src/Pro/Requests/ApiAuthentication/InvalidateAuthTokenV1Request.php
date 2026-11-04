<?php

namespace spkm\Jamf\Pro\Requests\ApiAuthentication;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Invalidate current token: POST /v1/auth/invalidate-token.
 *
 * Invalidates current token
 */
class InvalidateAuthTokenV1Request extends ActionRequest
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
        return '/v1/auth/invalidate-token';
    }
}
