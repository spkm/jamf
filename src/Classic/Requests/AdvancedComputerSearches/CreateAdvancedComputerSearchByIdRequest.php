<?php

namespace spkm\Jamf\Classic\Requests\AdvancedComputerSearches;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new advanced computer search by id: POST /advancedcomputersearches/id/{id}.
 */
class CreateAdvancedComputerSearchByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'advanced_computer_search';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <advanced_computer_search>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/advancedcomputersearches/id/'.Path::segment((string) $this->id);
    }
}
