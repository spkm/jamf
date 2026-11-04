<?php

namespace spkm\Jamf\Classic\Requests\DistributionPoints;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds distribution points by name: GET /distributionpoints/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindDistributionPointsByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/distributionpoints/name/'.Path::segment((string) $this->name);
    }
}
