<?php

namespace spkm\Jamf\Pro\Requests\PatchPolicyLogs;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Send retry attempts for specific devices: POST /v2/patch-policies/{id}/logs/retry.
 */
class RetryPatchPolicyLogsV2Request extends WriteRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/patch-policies/'.Path::segment((string) $this->id).'/logs/retry';
    }
}
