<?php

namespace spkm\Jamf\Classic\Requests\PatchPolicies;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds all patch policy by software title configuration id: GET /patchpolicies/softwaretitleconfig/id/{softwaretitleconfigid}.
 */
class FindPatchPoliciesBySoftwareTitleConfigIdRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $softwaretitleconfigid, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/patchpolicies/softwaretitleconfig/id/'.Path::segment((string) $this->softwaretitleconfigid);
    }
}
