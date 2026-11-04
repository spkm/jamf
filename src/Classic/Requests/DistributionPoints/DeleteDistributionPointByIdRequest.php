<?php

namespace spkm\Jamf\Classic\Requests\DistributionPoints;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a distribution point by id: DELETE /distributionpoints/id/{id}.
 */
class DeleteDistributionPointByIdRequest extends ClassicDeleteRequest
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
