<?php

namespace spkm\Jamf\Classic\Requests\Classes;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a class by id: DELETE /classes/id/{id}.
 */
class DeleteClassByIdRequest extends ClassicDeleteRequest
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
        return '/classes/id/'.Path::segment((string) $this->id);
    }
}
