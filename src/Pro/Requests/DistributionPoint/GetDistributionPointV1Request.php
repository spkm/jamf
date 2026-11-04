<?php

namespace spkm\Jamf\Pro\Requests\DistributionPoint;

use spkm\Jamf\Pro\Data\DistributionPoint;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified distribution point: GET /v1/distribution-points/{id}.
 */
class GetDistributionPointV1Request extends GetRequest
{
    protected ?string $dto = DistributionPoint::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/distribution-points/'.Path::segment((string) $this->id);
    }
}
