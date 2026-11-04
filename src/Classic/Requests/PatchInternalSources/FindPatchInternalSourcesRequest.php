<?php

namespace spkm\Jamf\Classic\Requests\PatchInternalSources;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all patch internal sources: GET /patchinternalsources.
 */
class FindPatchInternalSourcesRequest extends ClassicGetRequest
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
        return '/patchinternalsources';
    }
}
