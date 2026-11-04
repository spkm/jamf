<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\SsoFailoverData;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SsoFailover\GenerateSsoFailoverV1Request;
use spkm\Jamf\Pro\Requests\SsoFailover\GetSsoFailoverV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The sso-failover endpoints of the Jamf Pro API, from Jamf::ssoFailover().
 *
 * @extends BaseResource<Data>
 */
class SsoFailoverResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Regenerates failover url: POST /v1/sso/failover/generate.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function generateSsoFailoverV1(array $options = []): ?SsoFailoverData
    {
        return $this->fetch(new GenerateSsoFailoverV1Request($options));
    }

    /**
     * Retrieve the current failover settings: GET /v1/sso/failover.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSsoFailoverV1(array $options = []): ?SsoFailoverData
    {
        return $this->fetch(new GetSsoFailoverV1Request($options));
    }
}
