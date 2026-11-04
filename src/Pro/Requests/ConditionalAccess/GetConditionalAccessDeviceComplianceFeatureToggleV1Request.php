<?php

namespace spkm\Jamf\Pro\Requests\ConditionalAccess;

use spkm\Jamf\Pro\Data\SharedDeviceComplianceFeatureToggle;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieves Status of the Feature Toggle: GET /v1/conditional-access/device-compliance/feature-toggle.
 */
class GetConditionalAccessDeviceComplianceFeatureToggleV1Request extends GetRequest
{
    protected ?string $dto = SharedDeviceComplianceFeatureToggle::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/conditional-access/device-compliance/feature-toggle';
    }
}
