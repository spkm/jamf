<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\DashboardSetup;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Dashboard\GetDashboardV1Request;
use spkm\Jamf\Pro\Requests\Dashboard\ToggleDashboardV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The dashboard endpoints of the Jamf Pro API, from Jamf::dashboard().
 *
 * @extends BaseResource<Data>
 */
class DashboardResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get all the dashboard setup information: GET /v1/dashboard.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getDashboardV1(array $options = []): ?DashboardSetup
    {
        return $this->fetch(new GetDashboardV1Request($options));
    }

    /**
     * Add or remove an object to the Jamf Pro dashboard: POST /v1/dashboard/toggle.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function toggleDashboardV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new ToggleDashboardV1Request($body, $options));
    }
}
