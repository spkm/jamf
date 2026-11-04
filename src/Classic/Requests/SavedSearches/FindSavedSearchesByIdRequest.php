<?php

namespace spkm\Jamf\Classic\Requests\SavedSearches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds saved searches by id: GET /savedsearches/id/{id}.
 */
class FindSavedSearchesByIdRequest extends ClassicGetRequest
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
        return '/savedsearches/id/'.Path::segment((string) $this->id);
    }
}
