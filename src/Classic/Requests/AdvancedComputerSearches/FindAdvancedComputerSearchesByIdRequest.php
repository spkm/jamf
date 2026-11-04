<?php

namespace spkm\Jamf\Classic\Requests\AdvancedComputerSearches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer searches by id: GET /advancedcomputersearches/id/{id}.
 */
class FindAdvancedComputerSearchesByIdRequest extends ClassicGetRequest
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
        return '/advancedcomputersearches/id/'.Path::segment((string) $this->id);
    }
}
