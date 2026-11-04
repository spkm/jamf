<?php

namespace spkm\Jamf\Classic\Requests\PatchPolicies;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a patch policy by id: DELETE /patchpolicies/id/{id}.
 */
class DeletePatchPolicyByIdRequest extends ClassicDeleteRequest
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
        return '/patchpolicies/id/'.Path::segment((string) $this->id);
    }
}
