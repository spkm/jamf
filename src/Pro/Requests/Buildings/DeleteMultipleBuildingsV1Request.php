<?php

namespace spkm\Jamf\Pro\Requests\Buildings;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Delete multiple Buildings by their ids: POST /v1/buildings/delete-multiple.
 *
 * multiple many Buildings by their ids
 */
class DeleteMultipleBuildingsV1Request extends WriteRequest
{
    protected string $responseShape = self::NONE;

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
        return '/v1/buildings/delete-multiple';
    }
}
