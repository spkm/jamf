<?php

namespace spkm\Jamf\Pro\Requests\Buildings;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Export Buildings collection: POST /v1/buildings/export.
 */
class ExportBuildingsV1Request extends WriteRequest
{
    protected string $responseShape = self::TEXT;

    protected ?string $accept = 'text/csv';

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options Jamf documents: export-fields, export-labels, page,
     *                                         page-size, sort, filter.
     */
    public function __construct(array|JsonSerializable $body = [], array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/buildings/export';
    }
}
