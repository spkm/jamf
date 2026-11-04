<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\SelfServicePlusSettings;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\SelfServicePlus\GetSelfServicePlusFeatureToggleEnabledV1Request;
use spkm\Jamf\Pro\Requests\SelfServicePlus\GetSelfServicePlusSettingsV1Request;
use spkm\Jamf\Pro\Requests\SelfServicePlus\ReplaceSelfServicePlusSettingsV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The self-service-plus endpoints of the Jamf Pro API, from Jamf::selfServicePlus().
 *
 * @extends BaseResource<Data>
 */
class SelfServicePlusResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Determines if Self Service Plus feature toggle is enabled: GET /v1/self-service-plus/feature-toggle/enabled.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSelfServicePlusFeatureToggleEnabledV1(array $options = []): bool
    {
        return $this->perform(new GetSelfServicePlusFeatureToggleEnabledV1Request($options));
    }

    /**
     * Get Self Service Plus settings: GET /v1/self-service-plus/settings.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSelfServicePlusSettingsV1(array $options = []): ?SelfServicePlusSettings
    {
        return $this->fetch(new GetSelfServicePlusSettingsV1Request($options));
    }

    /**
     * Save Self Service Plus settings: PUT /v1/self-service-plus/settings.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceSelfServicePlusSettingsV1(array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new ReplaceSelfServicePlusSettingsV1Request($body, $options));
    }
}
