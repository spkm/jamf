<?php

namespace spkm\Jamf\Pro\Requests\SelfServicePlus;

use spkm\Jamf\Requests\GetRequest;

/**
 * Determines if Self Service Plus feature toggle is enabled: GET /v1/self-service-plus/feature-toggle/enabled.
 *
 * This endpoint is used to determine if the Self Service Plus feature toggle is enabled.
 */
class GetSelfServicePlusFeatureToggleEnabledV1Request extends GetRequest
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
        return '/v1/self-service-plus/feature-toggle/enabled';
    }
}
