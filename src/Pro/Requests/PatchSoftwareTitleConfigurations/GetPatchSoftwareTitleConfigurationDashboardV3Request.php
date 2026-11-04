<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Pro\Data\SoftwareTitleConfigurationOnDashboard;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return whether or not the requested software title configuration is on the dashboard: GET /v3/patch-software-title-configurations/{id}/dashboard.
 *
 * Returns whether or not the requested software title configuration is on the dashboard
 */
class GetPatchSoftwareTitleConfigurationDashboardV3Request extends GetRequest
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
        return '/v3/patch-software-title-configurations/'.Path::segment((string) $this->id).'/dashboard';
    }
}
