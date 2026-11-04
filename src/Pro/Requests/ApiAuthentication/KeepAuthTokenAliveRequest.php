<?php

namespace spkm\Jamf\Pro\Requests\ApiAuthentication;

use spkm\Jamf\Pro\Data\AuthToken;
use spkm\Jamf\Requests\ActionRequest;

/**
 * Invalidate existing token and generates new token: POST /auth/keepAlive.
 *
 * Invalidates existing token and generates new token with extended expiration based on existing token credentials.
 *
 * @deprecated Jamf deprecated this endpoint on 2020-06-01.
 */
class KeepAuthTokenAliveRequest extends ActionRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = AuthToken::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/auth/keepAlive';
    }
}
