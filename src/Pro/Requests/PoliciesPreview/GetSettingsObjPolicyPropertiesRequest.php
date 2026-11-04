<?php

namespace spkm\Jamf\Pro\Requests\PoliciesPreview;

use spkm\Jamf\Pro\Data\PolicyProperties;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Policy Properties object: GET /settings/obj/policyProperties.
 *
 * Gets `Policy Properties` object.
 *
 * @deprecated Jamf deprecated this endpoint on 2021-11-07.
 */
class GetSettingsObjPolicyPropertiesRequest extends GetRequest
{
    protected ?string $dto = PolicyProperties::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/settings/obj/policyProperties';
    }
}
