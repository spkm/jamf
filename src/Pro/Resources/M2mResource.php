<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\M2mTenantIdInfo;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\M2m\GetM2mTenantIdV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The m2m endpoints of the Jamf Pro API, from Jamf::m2m().
 *
 * @extends BaseResource<Data>
 */
class M2mResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Returns the M2M-sourced tenant ID: GET /v1/m2m/tenant-id.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getM2mTenantIdV1(array $options = []): ?M2mTenantIdInfo
    {
        return $this->fetch(new GetM2mTenantIdV1Request($options));
    }
}
