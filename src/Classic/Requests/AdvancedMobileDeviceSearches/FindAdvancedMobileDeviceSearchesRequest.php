<?php

namespace spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all advanced mobile device searches: GET /advancedmobiledevicesearches.
 */
class FindAdvancedMobileDeviceSearchesRequest extends ClassicGetRequest
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
        return '/advancedmobiledevicesearches';
    }
}
