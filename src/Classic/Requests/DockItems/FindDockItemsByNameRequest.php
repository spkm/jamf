<?php

namespace spkm\Jamf\Classic\Requests\DockItems;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds dock items by name: GET /dockitems/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindDockItemsByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/dockitems/name/'.Path::segment((string) $this->name);
    }
}
