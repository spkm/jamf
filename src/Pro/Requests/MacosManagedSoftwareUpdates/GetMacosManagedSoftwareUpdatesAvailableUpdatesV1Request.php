<?php

namespace spkm\Jamf\Pro\Requests\MacosManagedSoftwareUpdates;

use spkm\Jamf\Pro\Data\AvailableUpdates;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve available MacOs Managed Software Updates: GET /v1/macos-managed-software-updates/available-updates.
 *
 * Retrieves available MacOs Managed Software Updates
 *
 * @deprecated Jamf deprecated this endpoint on 2022-12-14.
 */
class GetMacosManagedSoftwareUpdatesAvailableUpdatesV1Request extends GetRequest
{
    protected ?string $dto = AvailableUpdates::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/macos-managed-software-updates/available-updates';
    }
}
