<?php

namespace spkm\Jamf\Classic\Requests\DistributionPoints;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds distribution points by id: GET /distributionpoints/id/{id}.
 */
class FindDistributionPointsByIdRequest extends ClassicGetRequest
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
        return '/distributionpoints/id/'.Path::segment((string) $this->id);
    }
}
