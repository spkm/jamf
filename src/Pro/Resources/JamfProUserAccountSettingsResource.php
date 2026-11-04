<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\UserPreferencesSettings;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfProUserAccountSettings\DeleteUserPreferenceV1Request;
use spkm\Jamf\Pro\Requests\JamfProUserAccountSettings\GetUserPreferencesSettingsV1Request;
use spkm\Jamf\Pro\Requests\JamfProUserAccountSettings\GetUserPreferenceV1Request;
use spkm\Jamf\Pro\Requests\JamfProUserAccountSettings\ReplaceUserPreferenceV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The jamf-pro-user-account-settings endpoints of the Jamf Pro API, from Jamf::jamfProUserAccountSettings().
 *
 * @extends BaseResource<Data>
 */
class JamfProUserAccountSettingsResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Remove specified setting for authenticated user: DELETE /v1/user/preferences/{keyId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteUserPreferenceV1(int|string $keyId, array $options = []): bool
    {
        return $this->perform(new DeleteUserPreferenceV1Request($keyId, $options));
    }

    /**
     * Get the user setting for the authenticated user and key: GET /v1/user/preferences/{keyId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getUserPreferenceV1(int|string $keyId, array $options = []): mixed
    {
        return $this->fetch(new GetUserPreferenceV1Request($keyId, $options));
    }

    /**
     * Get the user preferences for the authenticated user and key: GET /v1/user/preferences/settings/{keyId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getUserPreferencesSettingsV1(int|string $keyId, array $options = []): ?UserPreferencesSettings
    {
        return $this->fetch(new GetUserPreferencesSettingsV1Request($keyId, $options));
    }

    /**
     * Persist the user setting: PUT /v1/user/preferences/{keyId}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceUserPreferenceV1(int|string $keyId, array|JsonSerializable $body = [], array $options = []): mixed
    {
        return $this->fetch(new ReplaceUserPreferenceV1Request($keyId, $body, $options));
    }
}
