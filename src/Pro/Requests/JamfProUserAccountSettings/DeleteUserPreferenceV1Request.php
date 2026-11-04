<?php

namespace spkm\Jamf\Pro\Requests\JamfProUserAccountSettings;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified setting for authenticated user: DELETE /v1/user/preferences/{keyId}.
 */
class DeleteUserPreferenceV1Request extends DeleteRequest
{
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
