<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\PolicyProperties;
use spkm\Jamf\Pro\Data\PolicyPropertiesV1;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\PoliciesPreview\GetPolicyPropertiesV1Request;
use spkm\Jamf\Pro\Requests\PoliciesPreview\GetSettingsObjPolicyPropertiesRequest;
use spkm\Jamf\Pro\Requests\PoliciesPreview\ReplacePolicyPropertiesV1Request;
use spkm\Jamf\Pro\Requests\PoliciesPreview\ReplaceSettingsObjPolicyPropertiesRequest;
use spkm\Jamf\Resources\BaseResource;

/**
 * The policies-preview endpoints of the Jamf Pro API, from Jamf::policiesPreview().
 *
 * @extends BaseResource<Data>
 */
class PoliciesPreviewResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get Policy Properties object: GET /v1/policy-properties.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPolicyPropertiesV1(array $options = []): ?PolicyPropertiesV1
    {
        return $this->fetch(new GetPolicyPropertiesV1Request($options));
    }

    /**
     * Get Policy Properties object: GET /settings/obj/policyProperties.
     *
     * @deprecated Jamf deprecated this endpoint on 2021-11-07.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getSettingsObjPolicyProperties(array $options = []): ?PolicyProperties
    {
        return $this->fetch(new GetSettingsObjPolicyPropertiesRequest($options));
    }

    /**
     * Update Policy Properties object: PUT /v1/policy-properties.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replacePolicyPropertiesV1(array|JsonSerializable $body, array $options = []): ?PolicyPropertiesV1
    {
        return $this->fetch(new ReplacePolicyPropertiesV1Request($body, $options));
    }

    /**
     * Update Policy Properties object: PUT /settings/obj/policyProperties.
     *
     * @deprecated Jamf deprecated this endpoint on 2021-11-07.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceSettingsObjPolicyProperties(array|JsonSerializable $body, array $options = []): ?PolicyProperties
    {
        return $this->fetch(new ReplaceSettingsObjPolicyPropertiesRequest($body, $options));
    }
}
