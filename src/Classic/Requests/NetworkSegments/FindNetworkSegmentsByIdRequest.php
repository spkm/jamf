<?php

namespace spkm\Jamf\Classic\Requests\NetworkSegments;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds network segments by id: GET /networksegments/id/{id}.
 */
class FindNetworkSegmentsByIdRequest extends ClassicGetRequest
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
        return '/networksegments/id/'.Path::segment((string) $this->id);
    }
}
