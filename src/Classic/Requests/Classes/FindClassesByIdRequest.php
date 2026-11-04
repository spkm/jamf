<?php

namespace spkm\Jamf\Classic\Requests\Classes;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds classes by id: GET /classes/id/{id}.
 */
class FindClassesByIdRequest extends ClassicGetRequest
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
