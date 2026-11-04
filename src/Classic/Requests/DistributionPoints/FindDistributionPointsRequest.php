<?php

namespace spkm\Jamf\Classic\Requests\DistributionPoints;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all distribution points: GET /distributionpoints.
 */
class FindDistributionPointsRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/distributionpoints';
    }
}
