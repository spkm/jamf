<?php

namespace spkm\Jamf\Classic\Requests\SavedSearches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds saved searches by name: GET /savedsearches/name/{name}.
 */
class FindSavedSearchesByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/savedsearches/name/'.Path::segment((string) $this->name);
    }
}
