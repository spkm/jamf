<?php

namespace spkm\Jamf\Classic\Requests\NetworkSegments;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a network segment by id: DELETE /networksegments/id/{id}.
 */
class DeleteNetworkSegmentByIdRequest extends ClassicDeleteRequest
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
