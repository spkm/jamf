<?php

namespace spkm\Jamf\Classic\Requests\DockItems;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds dock items by id: GET /dockitems/id/{id}.
 */
class FindDockItemsByIdRequest extends ClassicGetRequest
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
