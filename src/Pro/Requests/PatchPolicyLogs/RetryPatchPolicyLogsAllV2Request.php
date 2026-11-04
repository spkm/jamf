<?php

namespace spkm\Jamf\Pro\Requests\PatchPolicyLogs;

use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Send retry attempts for all devices: POST /v2/patch-policies/{id}/logs/retry-all.
 */
class RetryPatchPolicyLogsAllV2Request extends ActionRequest
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
        return '/v2/patch-policies/'.Path::segment((string) $this->id).'/logs/retry-all';
    }
}
