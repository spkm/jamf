<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\DeviceCommonDetails;
use spkm\Jamf\Pro\Data\MdmRenewalErrorStrategiesResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\MdmRenewal\DeleteMdmRenewalRenewalStrategyV1Request;
use spkm\Jamf\Pro\Requests\MdmRenewal\GetMdmRenewalDeviceCommonDetailV1Request;
use spkm\Jamf\Pro\Requests\MdmRenewal\GetMdmRenewalRenewalStrategyV1Request;
use spkm\Jamf\Pro\Requests\MdmRenewal\UpdateMdmRenewalDeviceCommonDetailsV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The mdm-renewal endpoints of the Jamf Pro API, from Jamf::mdmRenewal().
 *
 * @extends BaseResource<Data>
 */
class MdmRenewalResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Delete MDM renewal strategies for a client management ID: DELETE
     * /v1/mdm-renewal/renewal-strategies/{clientManagementId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMdmRenewalRenewalStrategyV1(int|string $clientManagementId, array $options = []): bool
    {
        return $this->perform(new DeleteMdmRenewalRenewalStrategyV1Request($clientManagementId, $options));
    }

    /**
     * Get device common details for a client management ID: GET
     * /v1/mdm-renewal/device-common-details/{clientManagementId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMdmRenewalDeviceCommonDetailV1(int|string $clientManagementId, array $options = []): ?DeviceCommonDetails
    {
        return $this->fetch(new GetMdmRenewalDeviceCommonDetailV1Request($clientManagementId, $options));
    }

    /**
     * Get MDM renewal errors and strategies for a client management ID: GET
     * /v1/mdm-renewal/renewal-strategies/{clientManagementId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, MdmRenewalErrorStrategiesResponse>
     */
    public function getMdmRenewalRenewalStrategyV1(int|string $clientManagementId, array $options = []): Collection
    {
        return $this->fetch(new GetMdmRenewalRenewalStrategyV1Request($clientManagementId, $options));
    }

    /**
     * Update device common details (partial update): PATCH /v1/mdm-renewal/device-common-details.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateMdmRenewalDeviceCommonDetailsV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new UpdateMdmRenewalDeviceCommonDetailsV1Request($body, $options));
    }
}
