<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Pro\Data\SoftwareTitleConfigurationOnDashboard;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return whether or not the requested software title configuration is on the dashboard: GET /v2/patch-software-title-configurations/{id}/dashboard.
 *
 * Returns whether or not the requested software title configuration is on the dashboard
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class GetPatchSoftwareTitleConfigurationDashboardV2Request extends GetRequest
{
    protected ?string $dto = SoftwareTitleConfigurationOnDashboard::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/patch-software-title-configurations/'.Path::segment((string) $this->id).'/dashboard';
    }
}
