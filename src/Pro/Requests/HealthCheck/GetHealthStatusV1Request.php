<?php

namespace spkm\Jamf\Pro\Requests\HealthCheck;

use spkm\Jamf\Pro\Data\HealthStatus;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve request acceptance ratios for this Jamf Pro node: GET /v1/health-status.
 *
 * Returns metrics representing the request acceptance ratio for each concurrency group and time window on this Jamf
 * Pro node. The acceptance ratio is a decimal value between 0 and 1, where 1 means all requests were accepted and 0
 * means all were denied. Health status metrics are only available in Jamf Cloud. This API will return a 404 if the
 * Jamf Pro node does not support health status metrics.
 */
class GetHealthStatusV1Request extends GetRequest
{
    protected ?string $dto = HealthStatus::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/health-status';
    }
}
