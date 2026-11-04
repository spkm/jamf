<?php

namespace spkm\Jamf\Classic\Requests\PatchSoftwareTitles;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all patch software titles: GET /patchsoftwaretitles.
 */
class FindPatchSoftwareTitlesRequest extends ClassicGetRequest
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
        return '/patchsoftwaretitles';
    }
}
