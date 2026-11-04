<?php

namespace spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates;

use spkm\Jamf\Pro\Data\AvailableOsUpdates;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve available macOS and iOS Managed Software Updates: GET /v1/managed-software-updates/available-updates.
 *
 * Retrieves available macOS and iOS Managed Software Updates
 */
class GetManagedSoftwareUpdatesAvailableUpdatesV1Request extends GetRequest
{
    protected ?string $dto = AvailableOsUpdates::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/managed-software-updates/available-updates';
    }
}
