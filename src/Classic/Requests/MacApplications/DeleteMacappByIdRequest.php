<?php

namespace spkm\Jamf\Classic\Requests\MacApplications;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a mac application by id: DELETE /macapplications/id/{id}.
 */
class DeleteMacappByIdRequest extends ClassicDeleteRequest
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
        return '/macapplications/id/'.Path::segment((string) $this->id);
    }
}
