<?php

namespace spkm\Jamf\Pro\Requests\PoliciesPreview;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\PolicyPropertiesV1;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update Policy Properties object: PUT /v1/policy-properties.
 */
class ReplacePolicyPropertiesV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = PolicyPropertiesV1::class;

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
        return '/v1/policy-properties';
    }
}
