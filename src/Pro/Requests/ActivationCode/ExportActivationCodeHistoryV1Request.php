<?php

namespace spkm\Jamf\Pro\Requests\ActivationCode;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Export history object collection in specified format for Activation Code: POST /v1/activation-code/history/export.
 */
class ExportActivationCodeHistoryV1Request extends WriteRequest
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
        return '/v1/activation-code/history/export';
    }
}
