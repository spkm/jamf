<?php

namespace spkm\Jamf\Pro\Requests\SsoSettings;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Disable SSO: POST /v3/sso/disable.
 */
class DisableSsoV3Request extends ActionRequest
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
        return '/v3/sso/disable';
    }
}
