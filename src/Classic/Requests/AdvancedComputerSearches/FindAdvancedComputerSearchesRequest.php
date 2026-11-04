<?php

namespace spkm\Jamf\Classic\Requests\AdvancedComputerSearches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all advanced computer searches: GET /advancedcomputersearches.
 */
class FindAdvancedComputerSearchesRequest extends ClassicGetRequest
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
        return '/advancedcomputersearches';
    }
}
