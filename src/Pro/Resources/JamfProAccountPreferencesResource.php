<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\AccountPreferencesV5;
use spkm\Jamf\Pro\Data\AccountPreferencesV6;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfProAccountPreferences\GetAccountPreferencesV2Request;
use spkm\Jamf\Pro\Requests\JamfProAccountPreferences\GetAccountPreferencesV3Request;
use spkm\Jamf\Pro\Requests\JamfProAccountPreferences\UpdateAccountPreferencesV2Request;
use spkm\Jamf\Pro\Requests\JamfProAccountPreferences\UpdateAccountPreferencesV3Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The jamf-pro-account-preferences endpoints of the Jamf Pro API, from Jamf::jamfProAccountPreferences().
 *
 * @extends BaseResource<Data>
 */
class JamfProAccountPreferencesResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get Jamf Pro account preferences: GET /v2/account-preferences.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getAccountPreferencesV2(array $options = []): ?AccountPreferencesV5
    {
        return $this->fetch(new GetAccountPreferencesV2Request($options));
    }

    /**
     * Get Jamf Pro account preferences: GET /v3/account-preferences.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getAccountPreferencesV3(array $options = []): ?AccountPreferencesV6
    {
        return $this->fetch(new GetAccountPreferencesV3Request($options));
    }

    /**
     * Update Jamf Pro account preferences: PATCH /v2/account-preferences.
     *
     * @deprecated Jamf deprecated this endpoint on 2025-06-30.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateAccountPreferencesV2(array|JsonSerializable $body = [], array $options = []): ?AccountPreferencesV5
    {
        return $this->fetch(new UpdateAccountPreferencesV2Request($body, $options));
    }

    /**
     * Update Jamf Pro account preferences: PATCH /v3/account-preferences.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateAccountPreferencesV3(array|JsonSerializable $body = [], array $options = []): bool
    {
        return $this->perform(new UpdateAccountPreferencesV3Request($body, $options));
    }
}
