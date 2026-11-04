<?php

namespace spkm\Jamf\Pro\Requests\ActivationCode;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Add Activation Code object note: POST /v1/activation-code/history.
 *
 * Adds Activation Code object note.
 */
class CreateActivationCodeHistoryV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = ObjectHistory::class;

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
        return '/v1/activation-code/history';
    }
}
