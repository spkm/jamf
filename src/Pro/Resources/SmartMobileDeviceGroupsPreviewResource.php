<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\RecalculationResults;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SmartMobileDeviceGroupsPreview\RecalculateMobileDeviceSmartGroupsV1Request;
use spkm\Jamf\Pro\Requests\SmartMobileDeviceGroupsPreview\RecalculateSmartMobileDeviceGroupV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The smart-mobile-device-groups-preview endpoints of the Jamf Pro API, from Jamf::smartMobileDeviceGroupsPreview().
 *
 * @extends BaseResource<Data>
 */
class SmartMobileDeviceGroupsPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Recalculate all smart groups for the given device id and then return count of smart groups that device fall
     * into: POST /v1/mobile-devices/{id}/recalculate-smart-groups.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function recalculateMobileDeviceSmartGroupsV1(int|string $id, array $options = []): ?RecalculationResults
    {
        return $this->fetch(new RecalculateMobileDeviceSmartGroupsV1Request($id, $options));
    }

    /**
     * Recalculate a smart group for the given id then return the ids for the devices in the smart group: POST
     * /v1/smart-mobile-device-groups/{id}/recalculate.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function recalculateSmartMobileDeviceGroupV1(int|string $id, array $options = []): ?RecalculationResults
    {
        return $this->fetch(new RecalculateSmartMobileDeviceGroupV1Request($id, $options));
    }
}
