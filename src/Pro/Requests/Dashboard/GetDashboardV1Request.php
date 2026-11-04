<?php

namespace spkm\Jamf\Pro\Requests\Dashboard;

use spkm\Jamf\Pro\Data\DashboardSetup;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get all the dashboard setup information: GET /v1/dashboard.
 *
 * Get all the dashboard information for widgets and setup tasks
 */
class GetDashboardV1Request extends GetRequest
{
    protected ?string $dto = DashboardSetup::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/dashboard';
    }
}
