<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\JamfProInformationV2;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfProInformation\GetJamfProInformationV2Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The jamf-pro-information endpoints of the Jamf Pro API, from Jamf::jamfProInformation().
 *
 * @extends BaseResource<Data>
 */
class JamfProInformationResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get basic information about the Jamf Pro Server: GET /v2/jamf-pro-information.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getJamfProInformationV2(array $options = []): ?JamfProInformationV2
    {
        return $this->fetch(new GetJamfProInformationV2Request($options));
    }
}
