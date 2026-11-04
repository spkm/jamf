<?php

namespace spkm\Jamf\Pro\Requests\JamfProUserAccountSettings;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get the user setting for the authenticated user and key: GET /v1/user/preferences/{keyId}.
 *
 * Gets the user setting for the authenticated user and key.
 */
class GetUserPreferenceV1Request extends GetRequest
{
    protected string $responseShape = self::RAW;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $keyId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/user/preferences/'.Path::segment((string) $this->keyId);
    }
}
