<?php

namespace spkm\Jamf\Classic\Requests\PatchPolicies;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all patch policies: GET /patchpolicies.
 */
class FindPatchPoliciesRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/patchpolicies';
    }
}
