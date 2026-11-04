<?php

namespace spkm\Jamf\Classic\Requests\PatchPolicies;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for a patch policy: GET /patchpolicies/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a patch policy specified with the {id} parameter.
 * Lookup by name is also supported. For example, /patchpolicies/id/3/subset/General&Scope&UserInteraction or
 * /patchpolicies/id/3/subset/UserInteraction.
 */
class FindPatchPoliciesByIdSubsetRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $subset, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/patchpolicies/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
