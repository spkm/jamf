<?php

namespace spkm\Jamf\Pro\Requests\SmartMobileDeviceGroupsPreview;

use spkm\Jamf\Pro\Data\RecalculationResults;
use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Recalculate a smart group for the given id then return the ids for the devices in the smart group: POST /v1/smart-mobile-device-groups/{id}/recalculate.
 *
 * recalculates a smart group for the given id and then returns the ids for the devices in the smart group
 */
class RecalculateSmartMobileDeviceGroupV1Request extends ActionRequest
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
        return '/v1/smart-mobile-device-groups/'.Path::segment((string) $this->id).'/recalculate';
    }
}
