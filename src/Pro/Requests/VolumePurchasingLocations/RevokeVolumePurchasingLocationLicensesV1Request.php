<?php

namespace spkm\Jamf\Pro\Requests\VolumePurchasingLocations;

use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Revoke licenses for a Volume Purchasing Location with the supplied id: POST /v1/volume-purchasing-locations/{id}/revoke-licenses.
 *
 * Revokes licenses for a Volume Purchasing Location with the supplied id. The licenses must be revokable - any asset
 * whose licenses are irrevocable will not be revoked.
 */
class RevokeVolumePurchasingLocationLicensesV1Request extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/volume-purchasing-locations/'.Path::segment((string) $this->id).'/revoke-licenses';
    }
}
