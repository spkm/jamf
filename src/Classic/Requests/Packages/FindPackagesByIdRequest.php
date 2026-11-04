<?php

namespace spkm\Jamf\Classic\Requests\Packages;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds packages by id: GET /packages/id/{id}.
 */
class FindPackagesByIdRequest extends ClassicGetRequest
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
        return '/packages/id/'.Path::segment((string) $this->id);
    }
}
