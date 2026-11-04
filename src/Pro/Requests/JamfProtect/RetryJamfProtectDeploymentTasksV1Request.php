<?php

namespace spkm\Jamf\Pro\Requests\JamfProtect;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Request a retry of Protect install tasks: POST /v1/jamf-protect/deployments/{id}/tasks/retry.
 */
class RetryJamfProtectDeploymentTasksV1Request extends WriteRequest
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
        return '/v1/jamf-protect/deployments/'.Path::segment((string) $this->id).'/tasks/retry';
    }
}
