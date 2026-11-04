<?php

namespace spkm\Jamf\Pro\Requests\PatchPolicies;

use spkm\Jamf\Pro\Data\PatchPolicyV2OnDashboard;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return whether or not the requested patch policy is on the dashboard: GET /v2/patch-policies/{id}/dashboard.
 *
 * Returns whether or not the requested patch policy is on the dashboard
 */
class GetPatchPolicyDashboardV2Request extends GetRequest
{
    protected ?string $dto = PatchPolicyV2OnDashboard::class;

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
