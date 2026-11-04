<?php

namespace spkm\Jamf\Classic\Requests\DockItems;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a dock item by id: DELETE /dockitems/id/{id}.
 */
class DeleteDockItemByIdRequest extends ClassicDeleteRequest
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
        return '/dockitems/id/'.Path::segment((string) $this->id);
    }
}
