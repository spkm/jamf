<?php

namespace spkm\Jamf\Pro\Requests\PatchManagement;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Accept Patch Management disclaimer: POST /v2/patch-management-accept-disclaimer.
 */
class CreatePatchManagementAcceptDisclaimerV2Request extends ActionRequest
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
        return '/v2/patch-management-accept-disclaimer';
    }
}
