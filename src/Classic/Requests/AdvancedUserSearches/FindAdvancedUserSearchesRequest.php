<?php

namespace spkm\Jamf\Classic\Requests\AdvancedUserSearches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all advanced user searches: GET /advancedusersearches.
 */
class FindAdvancedUserSearchesRequest extends ClassicGetRequest
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
        return '/advancedusersearches';
    }
}
