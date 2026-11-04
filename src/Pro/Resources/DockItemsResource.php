<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\DockItem;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\DockItems\CreateDockItemsV1Request;
use spkm\Jamf\Pro\Requests\DockItems\DeleteDockItemV1Request;
use spkm\Jamf\Pro\Requests\DockItems\GetDockItemV1Request;
use spkm\Jamf\Pro\Requests\DockItems\ReplaceDockItemV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The dock-items endpoints of the Jamf Pro API, from Jamf::dockItems().
 *
 * @extends BaseResource<Data>
 */
class DockItemsResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Create a DockItem: POST /v1/dock-items.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createDockItemsV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateDockItemsV1Request($body, $options));
    }

    /**
     * Delete a DockItem at the specified id: DELETE /v1/dock-items/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteDockItemV1(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteDockItemV1Request($id, $options));
    }

    /**
     * Retrieve a full dockItem object: GET /v1/dock-items/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getDockItemV1(int|string $id, array $options = []): ?DockItem
    {
        return $this->fetch(new GetDockItemV1Request($id, $options));
    }

    /**
     * Replace the dockItem at the id with the supplied information: PUT /v1/dock-items/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceDockItemV1(int|string $id, array|JsonSerializable $body, array $options = []): ?string
    {
        return $this->fetch(new ReplaceDockItemV1Request($id, $body, $options));
    }
}
