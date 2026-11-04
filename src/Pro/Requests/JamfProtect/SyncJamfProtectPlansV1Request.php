<?php

namespace spkm\Jamf\Pro\Requests\JamfProtect;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Sync Plans with Jamf Protect: POST /v1/jamf-protect/plans/sync.
 */
class SyncJamfProtectPlansV1Request extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-protect/plans/sync';
    }
}
