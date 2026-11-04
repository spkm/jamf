<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\StartupStatus;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\StartupStatus\GetStartupStatusRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The startup-status endpoints of the Jamf Pro API, from Jamf::startupStatus().
 *
 * @extends BaseResource<Data>
 */
class StartupStatusResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Retrieve information about application startup: GET /startup-status.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getStartupStatus(array $options = []): ?StartupStatus
    {
        return $this->fetch(new GetStartupStatusRequest($options));
    }
}
