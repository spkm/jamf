<?php

namespace spkm\Jamf\Pro\Requests\PoliciesPreview;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\PolicyProperties;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update Policy Properties object: PUT /settings/obj/policyProperties.
 *
 * @deprecated Jamf deprecated this endpoint on 2021-11-07.
 */
class ReplaceSettingsObjPolicyPropertiesRequest extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = PolicyProperties::class;

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
        return '/settings/obj/policyProperties';
    }
}
