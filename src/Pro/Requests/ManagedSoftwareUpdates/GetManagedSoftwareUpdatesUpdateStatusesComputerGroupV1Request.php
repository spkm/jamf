<?php

namespace spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates;

use spkm\Jamf\Pro\Data\ManagedSoftwareUpdateStatus;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve Managed Software Update Statuses for Computer Groups: GET /v1/managed-software-updates/update-statuses/computer-groups/{id}.
 */
class GetManagedSoftwareUpdatesUpdateStatusesComputerGroupV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = ManagedSoftwareUpdateStatus::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/managed-software-updates/update-statuses/computer-groups/'.Path::segment((string) $this->id);
    }
}
