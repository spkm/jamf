<?php

namespace spkm\Jamf\Pro\Requests\DeclarativeDeviceManagement;

use spkm\Jamf\Pro\Data\StatusItem;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a Status Item from the latest Status Report for a device: GET /v1/ddm/{clientManagementId}/status-items/{key}.
 *
 * Retrieves a Status Item from the latest Status Report for a device
 */
class GetDdmStatusItemV1Request extends GetRequest
{
    protected ?string $dto = StatusItem::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $clientManagementId, protected string $key, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/ddm/'.Path::segment((string) $this->clientManagementId).'/status-items/'.Path::segment((string) $this->key);
    }
}
