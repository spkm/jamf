<?php

namespace spkm\Jamf\Classic\Requests\DockItems;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new dock item by id: POST /dockitems/id/{id}.
 */
class CreateDockItemByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'dock_item';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <dock_item>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/dockitems/id/'.Path::segment((string) $this->id);
    }
}
