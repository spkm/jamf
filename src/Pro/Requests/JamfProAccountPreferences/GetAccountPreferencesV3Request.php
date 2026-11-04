<?php

namespace spkm\Jamf\Pro\Requests\JamfProAccountPreferences;

use spkm\Jamf\Pro\Data\AccountPreferencesV6;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Jamf Pro account preferences: GET /v3/account-preferences.
 */
class GetAccountPreferencesV3Request extends GetRequest
{
    protected ?string $dto = AccountPreferencesV6::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/account-preferences';
    }
}
