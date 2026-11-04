<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove a software title configuration from the dashboard: DELETE /v2/patch-software-title-configurations/{id}/dashboard.
 *
 * Removes a software title configuration from the dashboard.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-07-14.
 */
class DeletePatchSoftwareTitleConfigurationDashboardV2Request extends DeleteRequest
{
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
