<?php

namespace spkm\Jamf\Pro\Requests\MobileDeviceGroups;

use spkm\Jamf\Pro\Data\MobileDeviceGroup;
use spkm\Jamf\Requests\GetRequest;

/**
 * Return the list of all Mobile Device Groups: GET /v1/mobile-device-groups.
 *
 * Returns the list of all mobile device groups.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-05-28.
 */
class GetMobileDeviceGroupsV1Request extends GetRequest
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
        return '/v1/mobile-device-groups';
    }
}
