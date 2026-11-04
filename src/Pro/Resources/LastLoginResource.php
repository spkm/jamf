<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\LastLoginResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\LastLogin\GetLastLoginV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The last-login endpoints of the Jamf Pro API, from Jamf::lastLogin().
 *
 * @extends BaseResource<Data>
 */
class LastLoginResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get the date of the last login event: GET /v1/last-login.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getLastLoginV1(array $options = []): ?LastLoginResponse
    {
        return $this->fetch(new GetLastLoginV1Request($options));
    }
}
