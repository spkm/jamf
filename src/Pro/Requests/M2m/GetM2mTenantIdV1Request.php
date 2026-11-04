<?php

namespace spkm\Jamf\Pro\Requests\M2m;

use spkm\Jamf\Pro\Data\M2mTenantIdInfo;
use spkm\Jamf\Requests\GetRequest;

/**
 * Returns the M2M-sourced tenant ID: GET /v1/m2m/tenant-id.
 */
class GetM2mTenantIdV1Request extends GetRequest
{
    protected ?string $dto = M2mTenantIdInfo::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/m2m/tenant-id';
    }
}
