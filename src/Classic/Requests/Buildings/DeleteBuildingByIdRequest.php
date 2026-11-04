<?php

namespace spkm\Jamf\Classic\Requests\Buildings;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a building by id: DELETE /buildings/id/{id}.
 */
class DeleteBuildingByIdRequest extends ClassicDeleteRequest
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
        return '/buildings/id/'.Path::segment((string) $this->id);
    }
}
