<?php

namespace spkm\Jamf\Pro\Requests\DeclarativeDeviceManagement;

use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Force a device DDM sync: POST /v1/ddm/{clientManagementId}/sync.
 *
 * Force a device to sync by queuing a new DeclarativeManagementCommand
 */
class SyncDdmV1Request extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $clientManagementId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/ddm/'.Path::segment((string) $this->clientManagementId).'/sync';
    }
}
