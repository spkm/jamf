<?php

namespace spkm\Jamf\Pro\Requests\DistributionPoint;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified distribution point: DELETE /v1/distribution-points/{id}.
 *
 * Removes specified distribution point
 */
class DeleteDistributionPointV1Request extends DeleteRequest
{
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
