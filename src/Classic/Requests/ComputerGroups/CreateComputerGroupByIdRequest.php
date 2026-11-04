<?php

namespace spkm\Jamf\Classic\Requests\ComputerGroups;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new computer group by id: POST /computergroups/id/{id}.
 *
 * POST also works with a name, but generally id is used.
 */
class CreateComputerGroupByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'computer_group';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <computer_group>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/computergroups/id/'.Path::segment((string) $this->id);
    }
}
