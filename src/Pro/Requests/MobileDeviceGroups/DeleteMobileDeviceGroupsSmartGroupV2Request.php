<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove Smart Group by Id: DELETE /v2/mobile-device-groups/smart-groups/{id}.
 */
class DeleteMobileDeviceGroupsSmartGroupV2Request extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mobile-device-groups/smart-groups/'.Path::segment((string) $this->id);
    }
}
