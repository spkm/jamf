<?php

namespace spkm\Jamf\Pro\Requests\PatchPolicyLogs;

use spkm\Jamf\Pro\Data\PatchPolicyLogEligibleRetryCount;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return the count of the Patch Policy Logs for the patch policy id that are eligible for a retry attempt: GET /v2/patch-policies/{id}/logs/eligible-retry-count.
 *
 * return the count of the patch policy logs for the patch policy id that are eligible for a retry attempt
 */
class GetPatchPolicyLogsEligibleRetryCountV2Request extends GetRequest
{
    protected ?string $dto = PatchPolicyLogEligibleRetryCount::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/patch-policies/'.Path::segment((string) $this->id).'/logs/eligible-retry-count';
    }
}
