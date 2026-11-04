<?php

namespace spkm\Jamf\Classic\Requests\Policies;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new policy by id: POST /policies/id/{id}.
 */
class CreatePolicyByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'policy';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <policy>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/policies/id/'.Path::segment((string) $this->id);
    }
}
