<?php

namespace spkm\Jamf\Classic\Requests\Sites;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a site by id: DELETE /sites/id/{id}.
 */
class DeleteSiteByIdRequest extends ClassicDeleteRequest
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
