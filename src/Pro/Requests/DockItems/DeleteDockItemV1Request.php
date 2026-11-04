<?php

namespace spkm\Jamf\Pro\Requests\DockItems;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a DockItem at the specified id: DELETE /v1/dock-items/{id}.
 *
 * Deletes a dockItem at the specified id
 */
class DeleteDockItemV1Request extends DeleteRequest
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
        return '/v1/dock-items/'.Path::segment((string) $this->id);
    }
}
