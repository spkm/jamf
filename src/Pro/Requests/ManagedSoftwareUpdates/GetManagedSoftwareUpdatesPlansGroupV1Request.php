<?php

namespace spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates;

use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlan;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve Managed Software Update Plans for a Group: GET /v1/managed-software-updates/plans/group/{id}.
 *
 * Retrieves Managed Software Update Plans for a Group
 */
class GetManagedSoftwareUpdatesPlansGroupV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = ManagedSoftwareUpdatePlan::class;

    /**
     * @param  array<string, mixed>  $options  Query options Jamf documents: group-type (required).
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/managed-software-updates/plans/group/'.Path::segment((string) $this->id);
    }
}
