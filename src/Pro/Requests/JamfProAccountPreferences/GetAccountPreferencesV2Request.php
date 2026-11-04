<?php

namespace spkm\Jamf\Pro\Requests\JamfProAccountPreferences;

use spkm\Jamf\Pro\Data\AccountPreferencesV5;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Jamf Pro account preferences: GET /v2/account-preferences.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-06-30.
 */
class GetAccountPreferencesV2Request extends GetRequest
{
    protected ?string $dto = AccountPreferencesV5::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/account-preferences';
    }
}
