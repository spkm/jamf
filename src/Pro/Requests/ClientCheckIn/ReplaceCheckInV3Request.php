<?php

namespace spkm\Jamf\Pro\Requests\ClientCheckIn;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\ClientCheckInV3;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Update Client Check-In object: PUT /v3/check-in.
 */
class ReplaceCheckInV3Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = ClientCheckInV3::class;

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
        return '/v3/check-in';
    }
}
