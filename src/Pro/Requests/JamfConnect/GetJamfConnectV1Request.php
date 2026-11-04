<?php

namespace spkm\Jamf\Pro\Requests\JamfConnect;

use spkm\Jamf\Requests\GetRequest;

/**
 * Get the Jamf Connect settings that you have access to see: GET /v1/jamf-connect.
 */
class GetJamfConnectV1Request extends GetRequest
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
        return '/v1/jamf-connect';
    }
}
