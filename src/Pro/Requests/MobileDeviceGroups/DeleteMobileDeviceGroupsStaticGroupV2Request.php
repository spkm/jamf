<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove Static Group by Id: DELETE /v2/mobile-device-groups/static-groups/{id}.
 */
class DeleteMobileDeviceGroupsStaticGroupV2Request extends DeleteRequest
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
        return '/v2/mobile-device-groups/static-groups/'.Path::segment((string) $this->id);
    }
}
