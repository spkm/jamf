<?php

namespace spkm\Jamf\Classic\Requests\Patches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all patches (Deprecated): GET /patches.
 */
class FindPatchesRequest extends ClassicGetRequest
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
        return '/patches';
    }
}
