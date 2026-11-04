<?php

namespace spkm\Jamf\Pro\Requests\ApiAuthentication;

use spkm\Jamf\Pro\Data\AuthTokenV1;
use spkm\Jamf\Requests\ActionRequest;

/**
 * Invalidate existing token and generates new token: POST /v1/auth/keep-alive.
 *
 * Invalidates existing token and generates new token with extended expiration based on existing token credentials.
 */
class KeepAuthTokenAliveV1Request extends ActionRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = AuthTokenV1::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/auth/keep-alive';
    }
}
