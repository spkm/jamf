<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\DssDeclarations;
use spkm\Jamf\Pro\Data\StatusItem;
use spkm\Jamf\Pro\Data\StatusItems;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\DeclarativeDeviceManagement\GetDdmStatusItemsV1Request;
use spkm\Jamf\Pro\Requests\DeclarativeDeviceManagement\GetDdmStatusItemV1Request;
use spkm\Jamf\Pro\Requests\DeclarativeDeviceManagement\GetDssDeclarationV1Request;
use spkm\Jamf\Pro\Requests\DeclarativeDeviceManagement\SyncDdmV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The declarative-device-management endpoints of the Jamf Pro API, from Jamf::declarativeDeviceManagement().
 *
 * @extends BaseResource<Data>
 */
class DeclarativeDeviceManagementResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Retrieve a Status Item from the latest Status Report for a device: GET
     * /v1/ddm/{clientManagementId}/status-items/{key}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getDdmStatusItemV1(int|string $clientManagementId, string $key, array $options = []): ?StatusItem
    {
        return $this->fetch(new GetDdmStatusItemV1Request($clientManagementId, $key, $options));
    }

    /**
     * Retrieve the Status Items from the latest Status Report for a device: GET
     * /v1/ddm/{clientManagementId}/status-items.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getDdmStatusItemsV1(int|string $clientManagementId, array $options = []): ?StatusItems
    {
        return $this->fetch(new GetDdmStatusItemsV1Request($clientManagementId, $options));
    }

    /**
     * Retrieve an existing declaration: GET /v1/dss-declarations/{declarationId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getDssDeclarationV1(int|string $declarationId, array $options = []): ?DssDeclarations
    {
        return $this->fetch(new GetDssDeclarationV1Request($declarationId, $options));
    }

    /**
     * Force a device DDM sync: POST /v1/ddm/{clientManagementId}/sync.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function syncDdmV1(int|string $clientManagementId, array $options = []): bool
    {
        return $this->perform(new SyncDdmV1Request($clientManagementId, $options));
    }
}
