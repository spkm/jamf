<?php

namespace spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates;

use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanToggleStatusWrapper;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieves background status of the Feature Toggle: GET /v1/managed-software-updates/plans/feature-toggle/status.
 */
class GetManagedSoftwareUpdatesPlansFeatureToggleStatusV1Request extends GetRequest
{
    protected ?string $dto = ManagedSoftwareUpdatePlanToggleStatusWrapper::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/managed-software-updates/plans/feature-toggle/status';
    }
}
