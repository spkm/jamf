<?php

namespace spkm\Jamf\Pro\Requests\Oidc;

use JsonSerializable;
use spkm\Jamf\Pro\Data\OidcLoginDispatchResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Provide the url to redirect for OIDC login: POST /v1/oidc/dispatch.
 *
 * @deprecated Jamf deprecated this endpoint on 2026-02-17.
 */
class DispatchOidcV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = OidcLoginDispatchResponse::class;

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
        return '/v1/oidc/dispatch';
    }
}
