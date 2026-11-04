<?php

namespace spkm\Jamf\Classic\Requests\AdvancedUserSearches;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a user search by id: DELETE /advancedusersearches/id/{id}.
 */
class DeleteAdvancedUserSearchByIdRequest extends ClassicDeleteRequest
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
        return '/advancedusersearches/id/'.Path::segment((string) $this->id);
    }
}
