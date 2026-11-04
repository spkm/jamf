<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use spkm\Jamf\Pro\Data\SmartGroupDetailV2;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Smart Group by Id: GET /v2/mobile-device-groups/smart-groups/{id}.
 */
class GetMobileDeviceGroupsSmartGroupV2Request extends GetRequest
{
    protected ?string $dto = SmartGroupDetailV2::class;

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
