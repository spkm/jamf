<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Add a software title configuration to the dashboard: POST /v2/patch-software-title-configurations/{id}/dashboard.
 *
 * Adds asoftware title configuration to the dashboard.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class CreatePatchSoftwareTitleConfigurationDashboardV2Request extends ActionRequest
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
        return '/v2/patch-software-title-configurations/'.Path::segment((string) $this->id).'/dashboard';
    }
}
