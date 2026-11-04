<?php

namespace spkm\Jamf\Pro\Requests\ServiceDiscoveryEnrollment;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update service discovery well-known settings: PUT /v1/service-discovery-enrollment/well-known-settings.
 *
 * Accepts JSON payload to update enrollment types for AxM organizations. Requires "Update User-Initiated Enrollment"
 * privilege.
 */
class ReplaceServiceDiscoveryEnrollmentWellKnownSettingsV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/service-discovery-enrollment/well-known-settings';
    }
}
