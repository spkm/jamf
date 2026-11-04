<?php

namespace spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates;

use spkm\Jamf\Pro\Data\ManagedSoftwareUpdateStatus;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve Managed Software Update Statuses: GET /v1/managed-software-updates/update-statuses.
 */
class GetManagedSoftwareUpdatesUpdateStatusesV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = ManagedSoftwareUpdateStatus::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: filter.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/managed-software-updates/update-statuses';
    }
}
