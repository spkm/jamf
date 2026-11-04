<?php

namespace spkm\Jamf\Classic\Requests\Policies;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing policy by id: PUT /policies/id/{id}.
 *
 * PUT also works with a name. One or more computers can be added by using instead of . One or more computers can be
 * deleted by using instead of
 */
class UpdatePolicyByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
