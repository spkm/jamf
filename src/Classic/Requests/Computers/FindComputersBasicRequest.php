<?php

namespace spkm\Jamf\Classic\Requests\Computers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all computers: GET /computers/subset/basic.
 *
 * returns a larger set of information about the computers in Jamf Pro.
 *
 * @deprecated Jamf deprecated this endpoint on 2025-02-11.
 */
class FindComputersBasicRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computers/subset/basic';
    }
}
