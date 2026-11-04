<?php

namespace spkm\Jamf\Pro\Requests\PatchPolicies;

use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Add a patch policy to the dashboard: POST /v2/patch-policies/{id}/dashboard.
 *
 * Adds a patch policy to the dashboard.
 */
class CreatePatchPolicyDashboardV2Request extends ActionRequest
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
        return '/v2/patch-policies/'.Path::segment((string) $this->id).'/dashboard';
    }
}
