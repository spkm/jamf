<?php

namespace spkm\Jamf\Pro\Requests\HealthCheck;

use spkm\Jamf\Requests\GetRequest;

/**
 * Get Jamf Pro API status: GET /v1/health-check.
 */
class GetHealthCheckV1Request extends GetRequest
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
        return '/v1/health-check';
    }
}
