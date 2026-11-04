<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\RedeployJamfManagementFrameworkResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfManagementFramework\RedeployJamfManagementFrameworkV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The jamf-management-framework endpoints of the Jamf Pro API, from Jamf::jamfManagementFramework().
 *
 * @extends BaseResource<Data>
 */
class JamfManagementFrameworkResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Redeploy Jamf Management Framework: POST /v1/jamf-management-framework/redeploy/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function redeployJamfManagementFrameworkV1(int|string $id, array $options = []): ?RedeployJamfManagementFrameworkResponse
    {
        return $this->fetch(new RedeployJamfManagementFrameworkV1Request($id, $options));
    }
}
