<?php

namespace spkm\Jamf\Pro\Requests\PoliciesPreview;

use spkm\Jamf\Pro\Data\PolicyPropertiesV1;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Policy Properties object: GET /v1/policy-properties.
 *
 * Gets `Policy Properties` object.
 */
class GetPolicyPropertiesV1Request extends GetRequest
{
    protected ?string $dto = PolicyPropertiesV1::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/policy-properties';
    }
}
