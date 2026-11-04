<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\LoginContent;
use spkm\Jamf\Pro\Data\LoginContentPut;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\LoginCustomization\GetLoginCustomizationV1Request;
use spkm\Jamf\Pro\Requests\LoginCustomization\ReplaceLoginCustomizationV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The login-customization endpoints of the Jamf Pro API, from Jamf::loginCustomization().
 *
 * @extends BaseResource<Data>
 */
class LoginCustomizationResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get current login disclaimer settings: GET /v1/login-customization.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getLoginCustomizationV1(array $options = []): ?LoginContent
    {
        return $this->fetch(new GetLoginCustomizationV1Request($options));
    }

    /**
     * Update current login disclaimer settings: PUT /v1/login-customization.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceLoginCustomizationV1(array|JsonSerializable $body, array $options = []): ?LoginContentPut
    {
        return $this->fetch(new ReplaceLoginCustomizationV1Request($body, $options));
    }
}
