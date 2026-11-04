<?php

namespace spkm\Jamf\Classic\Requests\ComputerGroups;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing computer group by id: PUT /computergroups/id/{id}.
 *
 * PUT also works with a name. One or more computers can be added by using instead of . One or more computers can be
 * deleted by using instead of
 */
class UpdateComputerGroupByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
