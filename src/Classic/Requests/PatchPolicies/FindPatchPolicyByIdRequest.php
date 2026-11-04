<?php

namespace spkm\Jamf\Classic\Requests\PatchPolicies;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds a patch policy by id: GET /patchpolicies/id/{id}.
 */
class FindPatchPolicyByIdRequest extends ClassicGetRequest
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
