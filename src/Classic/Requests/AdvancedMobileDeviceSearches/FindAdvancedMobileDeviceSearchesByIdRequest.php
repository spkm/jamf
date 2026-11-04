<?php

namespace spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device searches by id: GET /advancedmobiledevicesearches/id/{id}.
 */
class FindAdvancedMobileDeviceSearchesByIdRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/advancedmobiledevicesearches/id/'.Path::segment((string) $this->id);
    }
}
