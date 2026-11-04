<?php

namespace spkm\Jamf\Classic\Requests\Scripts;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds scripts by id: GET /scripts/id/{id}.
 *
 * script_contents_encoded is the equivalent of script_contents, but it has been Base 64 encoded.
 */
class FindScriptsByIdRequest extends ClassicGetRequest
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
