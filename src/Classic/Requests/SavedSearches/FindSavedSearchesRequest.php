<?php

namespace spkm\Jamf\Classic\Requests\SavedSearches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all saved searches (deprecated). advancedcomputersearches and advancedmobiledevicesearches should be used instead of savedsearches: GET /savedsearches.
 */
class FindSavedSearchesRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/savedsearches';
    }
}
