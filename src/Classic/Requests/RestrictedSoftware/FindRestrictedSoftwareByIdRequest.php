<?php

namespace spkm\Jamf\Classic\Requests\RestrictedSoftware;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds restricted software by id: GET /restrictedsoftware/id/{id}.
 */
class FindRestrictedSoftwareByIdRequest extends ClassicGetRequest
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
