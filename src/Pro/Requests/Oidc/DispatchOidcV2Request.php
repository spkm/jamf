<?php

namespace spkm\Jamf\Pro\Requests\Oidc;

use JsonSerializable;
use spkm\Jamf\Pro\Data\OidcLoginDispatchResponseV2;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Provide the url to redirect for OIDC login: POST /v2/oidc/dispatch.
 */
class DispatchOidcV2Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = OidcLoginDispatchResponseV2::class;

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
        return '/v2/oidc/dispatch';
    }
}
