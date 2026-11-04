<?php

namespace spkm\Jamf\Pro\Requests\DockItems;

use spkm\Jamf\Pro\Data\DockItem;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a full dockItem object: GET /v1/dock-items/{id}.
 *
 * Retrieves a full dockItem object
 */
class GetDockItemV1Request extends GetRequest
{
    protected ?string $dto = DockItem::class;

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
