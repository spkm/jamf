<?php

namespace spkm\Jamf\Pro\Requests\PatchPolicies;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove a patch policy from the dashboard: DELETE /v2/patch-policies/{id}/dashboard.
 *
 * Removes a patch policy from the dashboard.
 */
class DeletePatchPolicyDashboardV2Request extends DeleteRequest
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
        return '/v2/patch-policies/'.Path::segment((string) $this->id).'/dashboard';
    }
}
