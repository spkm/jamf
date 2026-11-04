<?php

namespace spkm\Jamf\Classic\Requests\PatchPolicies;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Create a new patch policy by software title configuration id: POST /patchpolicies/softwaretitleconfig/id/{softwaretitleconfigid}.
 */
class CreatePatchPolicyBySoftwareTitleConfigIdRequest extends ClassicWriteRequest
{
    protected string $root = 'patch_policy';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <patch_policy>), or the XML itself.
     */
    public function __construct(protected int|string $softwaretitleconfigid, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/patchpolicies/softwaretitleconfig/id/'.Path::segment((string) $this->softwaretitleconfigid);
    }
}
