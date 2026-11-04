<?php

namespace spkm\Jamf\Classic\Requests\NetworkSegments;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds network segments by name: GET /networksegments/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindNetworkSegmentsByNameRequest extends ClassicGetRequest
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
        return '/networksegments/name/'.Path::segment((string) $this->name);
    }
}
