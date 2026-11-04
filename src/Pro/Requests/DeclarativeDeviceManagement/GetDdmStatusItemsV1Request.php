<?php

namespace spkm\Jamf\Pro\Requests\DeclarativeDeviceManagement;

use spkm\Jamf\Pro\Data\StatusItems;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve the Status Items from the latest Status Report for a device: GET /v1/ddm/{clientManagementId}/status-items.
 *
 * Retrieves the Status Items from the latest Status Report for a device
 */
class GetDdmStatusItemsV1Request extends GetRequest
{
    protected ?string $dto = StatusItems::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $clientManagementId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/ddm/'.Path::segment((string) $this->clientManagementId).'/status-items';
    }
}
