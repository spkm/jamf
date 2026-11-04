<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\PatchManagement\CreatePatchManagementAcceptDisclaimerV2Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The patch-management endpoints of the Jamf Pro API, from Jamf::patchManagement().
 *
 * @extends BaseResource<Data>
 */
class PatchManagementResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Accept Patch Management disclaimer: POST /v2/patch-management-accept-disclaimer.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPatchManagementAcceptDisclaimerV2(array $options = []): bool
    {
        return $this->perform(new CreatePatchManagementAcceptDisclaimerV2Request($options));
    }
}
