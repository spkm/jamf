<?php

namespace spkm\Jamf\Classic\Requests\AdvancedComputerSearches;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a computer search by id: DELETE /advancedcomputersearches/id/{id}.
 */
class DeleteAdvancedComputerSearchByIdRequest extends ClassicDeleteRequest
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
