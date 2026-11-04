<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Add a software title configuration to the dashboard: POST /v3/patch-software-title-configurations/{id}/dashboard.
 *
 * Adds a software title configuration to the dashboard.
 */
class CreatePatchSoftwareTitleConfigurationDashboardV3Request extends ActionRequest
{
    protected string $responseShape = self::NONE;

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
