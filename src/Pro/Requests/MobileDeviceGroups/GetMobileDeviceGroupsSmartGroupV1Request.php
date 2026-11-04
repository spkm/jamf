<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use spkm\Jamf\Pro\Data\SmartGroupDetail;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Smart Group by Id: GET /v1/mobile-device-groups/smart-groups/{id}.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class GetMobileDeviceGroupsSmartGroupV1Request extends GetRequest
{
    protected ?string $dto = SmartGroupDetail::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mobile-device-groups/smart-groups/'.Path::segment((string) $this->id);
    }
}
