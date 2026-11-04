<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\CloudResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\CloudInformation\GetCloudInformationV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The cloud-information endpoints of the Jamf Pro API, from Jamf::cloudInformation().
 *
 * @extends BaseResource<Data>
 */
class CloudInformationResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Retrieve information related to cloud setup: GET /v1/cloud-information.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCloudInformationV1(array $options = []): ?CloudResponse
    {
        return $this->fetch(new GetCloudInformationV1Request($options));
    }
}
