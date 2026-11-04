<?php

namespace spkm\Jamf\Pro\Requests\JamfProUserAccountSettings;

use spkm\Jamf\Pro\Data\UserPreferencesSettings;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get the user preferences for the authenticated user and key: GET /v1/user/preferences/settings/{keyId}.
 *
 * Gets the user preferences for the authenticated user and key.
 */
class GetUserPreferencesSettingsV1Request extends GetRequest
{
    protected ?string $dto = UserPreferencesSettings::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $keyId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/user/preferences/settings/'.Path::segment((string) $this->keyId);
    }
}
