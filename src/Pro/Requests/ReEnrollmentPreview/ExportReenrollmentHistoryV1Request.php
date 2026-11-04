<?php

namespace spkm\Jamf\Pro\Requests\ReEnrollmentPreview;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Export reenrollment history collection: POST /v1/reenrollment/history/export.
 */
class ExportReenrollmentHistoryV1Request extends WriteRequest
{
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
        return '/v1/reenrollment/history/export';
    }
}
