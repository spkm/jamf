<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\JamfProVersion;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfProVersion\GetJamfProVersionV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The jamf-pro-version endpoints of the Jamf Pro API, from Jamf::jamfProVersion().
 *
 * @extends BaseResource<Data>
 */
class JamfProVersionResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Return information about the Jamf Pro including the current version: GET /v1/jamf-pro-version.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getJamfProVersionV1(array $options = []): ?JamfProVersion
    {
        return $this->fetch(new GetJamfProVersionV1Request($options));
    }
}
