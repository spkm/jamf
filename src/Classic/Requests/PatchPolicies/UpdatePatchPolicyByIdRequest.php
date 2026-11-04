<?php

namespace spkm\Jamf\Classic\Requests\PatchPolicies;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing patch policy by id: PUT /patchpolicies/id/{id}.
 */
class UpdatePatchPolicyByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'patch_policy';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <patch_policy>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/patchpolicies/id/'.Path::segment((string) $this->id);
    }
}
