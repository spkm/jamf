<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\AvailableUpdates;
use spkm\Jamf\Pro\Data\MacOsManagedSoftwareUpdateResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\MacosManagedSoftwareUpdates\GetMacosManagedSoftwareUpdatesAvailableUpdatesV1Request;
use spkm\Jamf\Pro\Requests\MacosManagedSoftwareUpdates\SendMacosManagedSoftwareUpdatesUpdatesV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The macos-managed-software-updates endpoints of the Jamf Pro API, from Jamf::macosManagedSoftwareUpdates().
 *
 * @extends BaseResource<Data>
 */
class MacosManagedSoftwareUpdatesResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Retrieve available MacOs Managed Software Updates: GET /v1/macos-managed-software-updates/available-updates.
     *
     * @deprecated Jamf deprecated this endpoint on 2022-12-14.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getMacosManagedSoftwareUpdatesAvailableUpdatesV1(array $options = []): ?AvailableUpdates
    {
        return $this->fetch(new GetMacosManagedSoftwareUpdatesAvailableUpdatesV1Request($options));
    }

    /**
     * Send MacOs Managed Software Updates: POST /v1/macos-managed-software-updates/send-updates.
     *
     * @deprecated Jamf deprecated this endpoint on 2022-10-17.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function sendMacosManagedSoftwareUpdatesUpdatesV1(array|JsonSerializable $body, array $options = []): ?MacOsManagedSoftwareUpdateResponse
    {
        return $this->fetch(new SendMacosManagedSoftwareUpdatesUpdatesV1Request($body, $options));
    }
}
