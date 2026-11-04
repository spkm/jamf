<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\DeviceComplianceInformation;
use spkm\Jamf\Pro\Data\SharedDeviceComplianceFeatureToggle;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ConditionalAccess\GetConditionalAccessDeviceComplianceFeatureToggleV1Request;
use spkm\Jamf\Pro\Requests\ConditionalAccess\GetConditionalAccessDeviceComplianceInformationComputerV1Request;
use spkm\Jamf\Pro\Requests\ConditionalAccess\GetConditionalAccessDeviceComplianceInformationMobileV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The conditional-access endpoints of the Jamf Pro API, from Jamf::conditionalAccess().
 *
 * @extends BaseResource<Data>
 */
class ConditionalAccessResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Retrieves Status of the Feature Toggle: GET /v1/conditional-access/device-compliance/feature-toggle.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getConditionalAccessDeviceComplianceFeatureToggleV1(array $options = []): ?SharedDeviceComplianceFeatureToggle
    {
        return $this->fetch(new GetConditionalAccessDeviceComplianceFeatureToggleV1Request($options));
    }

    /**
     * Get compliance information for a single computer device: GET
     * /v1/conditional-access/device-compliance-information/computer/{deviceId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, DeviceComplianceInformation>
     */
    public function getConditionalAccessDeviceComplianceInformationComputerV1(int|string $deviceId, array $options = []): Collection
    {
        return $this->fetch(new GetConditionalAccessDeviceComplianceInformationComputerV1Request($deviceId, $options));
    }

    /**
     * Get compliance information for a single mobile device: GET
     * /v1/conditional-access/device-compliance-information/mobile/{deviceId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, DeviceComplianceInformation>
     */
    public function getConditionalAccessDeviceComplianceInformationMobileV1(int|string $deviceId, array $options = []): Collection
    {
        return $this->fetch(new GetConditionalAccessDeviceComplianceInformationMobileV1Request($deviceId, $options));
    }
}
