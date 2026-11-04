<?php

namespace spkm\Jamf\Pro\Requests\JamfProInitialization;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Set up fresh installed Jamf Pro Server for Platform: POST /v1/system/platform-initialize.
 *
 * Set up fresh installed Jamf Pro Server with OIDC SSO enabled and single federated user
 */
class InitializeSystemPlatformV1Request extends WriteRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/system/platform-initialize';
    }
}
