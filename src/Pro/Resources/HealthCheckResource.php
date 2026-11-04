<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\HealthStatus;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\HealthCheck\GetHealthCheckV1Request;
use spkm\Jamf\Pro\Requests\HealthCheck\GetHealthStatusV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The health-check endpoints of the Jamf Pro API, from Jamf::healthCheck().
 *
 * @extends BaseResource<Data>
 */
class HealthCheckResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get Jamf Pro API status: GET /v1/health-check.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getHealthCheckV1(array $options = []): bool
    {
        return $this->perform(new GetHealthCheckV1Request($options));
    }

    /**
     * Retrieve request acceptance ratios for this Jamf Pro node: GET /v1/health-status.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getHealthStatusV1(array $options = []): ?HealthStatus
    {
        return $this->fetch(new GetHealthStatusV1Request($options));
    }
}
