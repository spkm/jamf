<?php

namespace spkm\Jamf\Pro\Requests\GsxConnection;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Add specified GSX Connection history object notes: POST /v1/gsx-connection/history.
 *
 * Adds specified GSX Connection history object notes
 */
class CreateGsxConnectionHistoryV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = HrefResponse::class;

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
        return '/v1/gsx-connection/history';
    }
}
