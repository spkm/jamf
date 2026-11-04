<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\JamfApplicationResponse;
use spkm\Jamf\Pro\Data\JamfPackageResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfPackage\GetJamfPackageV1Request;
use spkm\Jamf\Pro\Requests\JamfPackage\GetJamfPackageV2Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The jamf-package endpoints of the Jamf Pro API, from Jamf::jamfPackage().
 *
 * @extends BaseResource<Data>
 */
class JamfPackageResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get the packages for a given Jamf application: GET /v1/jamf-package.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: application (required).
     * @return Collection<int, JamfPackageResponse>
     */
    public function getJamfPackageV1(array $options = []): Collection
    {
        return $this->fetch(new GetJamfPackageV1Request($options));
    }

    /**
     * Get the packages for a given Jamf application: GET /v2/jamf-package.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: application (required).
     */
    public function getJamfPackageV2(array $options = []): ?JamfApplicationResponse
    {
        return $this->fetch(new GetJamfPackageV2Request($options));
    }
}
