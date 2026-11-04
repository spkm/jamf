<?php

namespace spkm\Jamf\Classic\Requests\ComputerGroups;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a computer group by id: DELETE /computergroups/id/{id}.
 */
class DeleteComputerGroupByIdRequest extends ClassicDeleteRequest
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
        return '/computergroups/id/'.Path::segment((string) $this->id);
    }
}
