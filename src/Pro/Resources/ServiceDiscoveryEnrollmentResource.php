<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\WellKnownSettingsResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ServiceDiscoveryEnrollment\GetServiceDiscoveryEnrollmentWellKnownSettingsV1Request;
use spkm\Jamf\Pro\Requests\ServiceDiscoveryEnrollment\ReplaceServiceDiscoveryEnrollmentWellKnownSettingsV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The service-discovery-enrollment endpoints of the Jamf Pro API, from Jamf::serviceDiscoveryEnrollment().
 *
 * @extends BaseResource<Data>
 */
class ServiceDiscoveryEnrollmentResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get service discovery well-known settings for all organizations: GET
     * /v1/service-discovery-enrollment/well-known-settings.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getServiceDiscoveryEnrollmentWellKnownSettingsV1(array $options = []): ?WellKnownSettingsResponse
    {
        return $this->fetch(new GetServiceDiscoveryEnrollmentWellKnownSettingsV1Request($options));
    }

    /**
     * Update service discovery well-known settings: PUT /v1/service-discovery-enrollment/well-known-settings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceServiceDiscoveryEnrollmentWellKnownSettingsV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new ReplaceServiceDiscoveryEnrollmentWellKnownSettingsV1Request($body, $options));
    }
}
