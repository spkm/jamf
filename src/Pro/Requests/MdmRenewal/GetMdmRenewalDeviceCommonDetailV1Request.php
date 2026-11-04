<?php

namespace spkm\Jamf\Pro\Requests\MdmRenewal;

use spkm\Jamf\Pro\Data\DeviceCommonDetails;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get device common details for a client management ID: GET /v1/mdm-renewal/device-common-details/{clientManagementId}.
 *
 * Retrieves device common details associated with a specific client management ID
 */
class GetMdmRenewalDeviceCommonDetailV1Request extends GetRequest
{
    protected ?string $dto = DeviceCommonDetails::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $clientManagementId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/mdm-renewal/device-common-details/'.Path::segment((string) $this->clientManagementId);
    }
}
