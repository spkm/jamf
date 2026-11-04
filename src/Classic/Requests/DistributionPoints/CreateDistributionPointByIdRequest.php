<?php

namespace spkm\Jamf\Classic\Requests\DistributionPoints;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new distribution point by id: POST /distributionpoints/id/{id}.
 */
class CreateDistributionPointByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'distribution_point';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <distribution_point>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/distributionpoints/id/'.Path::segment((string) $this->id);
    }
}
