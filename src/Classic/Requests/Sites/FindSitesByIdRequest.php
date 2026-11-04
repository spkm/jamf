<?php

namespace spkm\Jamf\Classic\Requests\Sites;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds sites by id: GET /sites/id/{id}.
 */
class FindSitesByIdRequest extends ClassicGetRequest
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
        return '/sites/id/'.Path::segment((string) $this->id);
    }
}
