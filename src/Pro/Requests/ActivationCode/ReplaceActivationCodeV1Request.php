<?php

namespace spkm\Jamf\Pro\Requests\ActivationCode;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Updates Activation Code: PUT /v1/activation-code.
 */
class ReplaceActivationCodeV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::NONE;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/activation-code';
    }
}
