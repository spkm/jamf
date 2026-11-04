<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use spkm\Jamf\Pro\Data\StaticGroup;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Static Group by Id: GET /v2/mobile-device-groups/static-groups/{id}.
 */
class GetMobileDeviceGroupsStaticGroupV2Request extends GetRequest
{
    protected ?string $dto = StaticGroup::class;

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
