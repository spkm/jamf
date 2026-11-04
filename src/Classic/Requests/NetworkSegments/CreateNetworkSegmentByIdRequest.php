<?php

namespace spkm\Jamf\Classic\Requests\NetworkSegments;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new network segment by id: POST /networksegments/id/{id}.
 */
class CreateNetworkSegmentByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'network_segment';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <network_segment>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/networksegments/id/'.Path::segment((string) $this->id);
    }
}
