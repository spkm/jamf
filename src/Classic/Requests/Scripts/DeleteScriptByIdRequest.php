<?php

namespace spkm\Jamf\Classic\Requests\Scripts;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a script by id: DELETE /scripts/id/{id}.
 */
class DeleteScriptByIdRequest extends ClassicDeleteRequest
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
        return '/scripts/id/'.Path::segment((string) $this->id);
    }
}
