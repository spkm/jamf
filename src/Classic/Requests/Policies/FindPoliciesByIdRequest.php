<?php

namespace spkm\Jamf\Classic\Requests\Policies;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds policies by id: GET /policies/id/{id}.
 */
class FindPoliciesByIdRequest extends ClassicGetRequest
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
        return '/policies/id/'.Path::segment((string) $this->id);
    }
}
