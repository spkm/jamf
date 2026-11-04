<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\CsaTenantIdInfo;
use spkm\Jamf\Pro\Data\CsaToken;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Csa\DeleteCsaTokenV1Request;
use spkm\Jamf\Pro\Requests\Csa\GetCsaTenantIdV1Request;
use spkm\Jamf\Pro\Requests\Csa\GetCsaTokenV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The csa endpoints of the Jamf Pro API, from Jamf::csa().
 *
 * @extends BaseResource<Data>
 */
class CsaResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Delete the CSA token exchange - This will disable Jamf Pro's ability to authenticate with cloud-hosted
     * services: DELETE /v1/csa/token.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteCsaTokenV1(array $options = []): bool
    {
        return $this->perform(new DeleteCsaTokenV1Request($options));
    }

    /**
     * Returns the CSA tenant ID: GET /v1/csa/tenant-id.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCsaTenantIdV1(array $options = []): ?CsaTenantIdInfo
    {
        return $this->fetch(new GetCsaTenantIdV1Request($options));
    }

    /**
     * Get details regarding the CSA token exchange: GET /v1/csa/token.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getCsaTokenV1(array $options = []): ?CsaToken
    {
        return $this->fetch(new GetCsaTokenV1Request($options));
    }
}
