<?php

namespace spkm\Jamf\Pro\Requests\Departments;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Deletes all departments by ids passed in body: POST /v1/departments/delete-multiple.
 */
class DeleteMultipleDepartmentsV1Request extends WriteRequest
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
        return '/v1/departments/delete-multiple';
    }
}
