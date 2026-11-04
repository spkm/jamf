<?php

namespace spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates;

use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanEventStore;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a Managed Software Update Plan Event Store: GET /v1/managed-software-updates/plans/{id}/events.
 *
 * Retrieves a Managed Software Update Plan Event Store
 */
class GetManagedSoftwareUpdatesPlanEventsV1Request extends GetRequest
{
    protected ?string $dto = ManagedSoftwareUpdatePlanEventStore::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/managed-software-updates/plans/'.Path::segment((string) $this->id).'/events';
    }
}
