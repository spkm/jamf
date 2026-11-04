<?php

namespace spkm\Jamf\Classic\Requests\RestrictedSoftware;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a restricted software by id: DELETE /restrictedsoftware/id/{id}.
 */
class DeleteRestrictedSoftwareByIdRequest extends ClassicDeleteRequest
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
        return '/restrictedsoftware/id/'.Path::segment((string) $this->id);
    }
}
