<?php

namespace spkm\Jamf\Pro\Requests\SmartMobileDeviceGroupsPreview;

use spkm\Jamf\Pro\Data\RecalculationResults;
use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Recalculate all smart groups for the given device id and then return count of smart groups that device fall into: POST /v1/mobile-devices/{id}/recalculate-smart-groups.
 *
 * Recalculates all smart groups for the given device id and then returns the count of smart groups the device falls
 * into
 */
class RecalculateMobileDeviceSmartGroupsV1Request extends ActionRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = RecalculationResults::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mobile-devices/'.Path::segment((string) $this->id).'/recalculate-smart-groups';
    }
}
