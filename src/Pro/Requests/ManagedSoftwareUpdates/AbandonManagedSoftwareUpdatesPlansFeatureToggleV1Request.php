<?php

namespace spkm\Jamf\Pro\Requests\ManagedSoftwareUpdates;

use spkm\Jamf\Requests\ActionRequest;

/**
 * Force stops any ongoing or stalled feature-toggle processes: POST /v1/managed-software-updates/plans/feature-toggle/abandon.
 *
 * "Break Glass" endpoint, not for nominal usage. Use this endpoint to forcefully abandon the feature-toggle
 * background process if the status of the feature-toggle is 'stuck' or has reached an non-restartable failed state.
 * Usage of this endpoint under nominal conditions is undefined and unsupported.
 */
class AbandonManagedSoftwareUpdatesPlansFeatureToggleV1Request extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/managed-software-updates/plans/feature-toggle/abandon';
    }
}
