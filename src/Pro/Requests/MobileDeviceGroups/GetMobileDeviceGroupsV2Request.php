<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use spkm\Jamf\Pro\Data\MobileDeviceGroup;
use spkm\Jamf\Requests\GetRequest;

/**
 * Return the list of all Mobile Device Groups: GET /v2/mobile-device-groups.
 *
 * Returns the list of all mobile device groups filtered by site and permissions.
 */
class GetMobileDeviceGroupsV2Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = MobileDeviceGroup::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/mobile-device-groups';
    }
}
