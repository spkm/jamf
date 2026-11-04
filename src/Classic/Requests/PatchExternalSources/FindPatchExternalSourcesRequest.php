<?php

namespace spkm\Jamf\Classic\Requests\PatchExternalSources;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all patch external sources: GET /patchexternalsources.
 */
class FindPatchExternalSourcesRequest extends ClassicGetRequest
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
        return '/patchexternalsources';
    }
}
