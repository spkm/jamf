<?php

namespace spkm\Jamf\Pro\Requests\Devices;

use spkm\Jamf\Pro\Data\DeviceGroup;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Return a list of groups for a device: GET /v1/devices/{id}/groups.
 *
 * Returns a list of groups that the specified device belongs to.
 */
class GetDeviceGroupsV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = DeviceGroup::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/devices/'.Path::segment((string) $this->id).'/groups';
    }
}
