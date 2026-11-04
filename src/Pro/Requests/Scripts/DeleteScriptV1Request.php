<?php

namespace spkm\Jamf\Pro\Requests\Scripts;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a Script at the specified id: DELETE /v1/scripts/{id}.
 *
 * Deletes a script at the specified id
 */
class DeleteScriptV1Request extends DeleteRequest
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
        return '/v1/scripts/'.Path::segment((string) $this->id);
    }
}
