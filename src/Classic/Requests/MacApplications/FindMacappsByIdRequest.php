<?php

namespace spkm\Jamf\Classic\Requests\MacApplications;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mac applications by id: GET /macapplications/id/{id}.
 */
class FindMacappsByIdRequest extends ClassicGetRequest
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
