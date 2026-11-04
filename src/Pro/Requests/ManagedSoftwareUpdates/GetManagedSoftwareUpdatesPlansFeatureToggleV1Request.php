<?php

namespace spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates;

use spkm\Jamf\Pro\Data\ManagedSoftwareUpdatePlanToggle;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve current value of the Feature Toggle: GET /v1/managed-software-updates/plans/feature-toggle.
 *
 * Retrieves current value of the Feature Toggle
 */
class GetManagedSoftwareUpdatesPlansFeatureToggleV1Request extends GetRequest
{
    protected ?string $dto = ManagedSoftwareUpdatePlanToggle::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/managed-software-updates/plans/feature-toggle';
    }
}
