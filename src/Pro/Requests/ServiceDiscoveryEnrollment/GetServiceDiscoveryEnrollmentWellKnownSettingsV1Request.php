<?php

namespace spkm\Jamf\Pro\Requests\ServiceDiscoveryEnrollment;

use spkm\Jamf\Pro\Data\WellKnownSettingsResponse;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get service discovery well-known settings for all organizations: GET /v1/service-discovery-enrollment/well-known-settings.
 *
 * Returns current settings for all AxM organizations.
 */
class GetServiceDiscoveryEnrollmentWellKnownSettingsV1Request extends GetRequest
{
    protected ?string $dto = WellKnownSettingsResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/service-discovery-enrollment/well-known-settings';
    }
}
