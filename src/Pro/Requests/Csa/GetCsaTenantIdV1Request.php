<?php

namespace spkm\Jamf\Pro\Requests\Csa;

use spkm\Jamf\Pro\Data\CsaTenantIdInfo;
use spkm\Jamf\Requests\GetRequest;

/**
 * Returns the CSA tenant ID: GET /v1/csa/tenant-id.
 */
class GetCsaTenantIdV1Request extends GetRequest
{
    protected ?string $dto = CsaTenantIdInfo::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/csa/tenant-id';
    }
}
