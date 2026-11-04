<?php

namespace spkm\Jamf\Pro\Requests\LocalAdminPassword;

use spkm\Jamf\Pro\Data\LapsSettingsResponseV2;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get the current LAPS settings: GET /v2/local-admin-password/settings.
 *
 * Return information about the current LAPS settings.
 */
class GetLocalAdminPasswordSettingsV2Request extends GetRequest
{
    protected ?string $dto = LapsSettingsResponseV2::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/local-admin-password/settings';
    }
}
