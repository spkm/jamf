<?php

namespace spkm\Jamf\Classic\Requests\AdvancedMobileDeviceSearches;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a mobile device search by id: DELETE /advancedmobiledevicesearches/id/{id}.
 */
class DeleteAdvancedMobileDeviceSearchByIdRequest extends ClassicDeleteRequest
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
