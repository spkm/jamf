<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Export enrollment history collection: POST /v2/enrollment/history/export.
 */
class ExportEnrollmentHistoryV2Request extends WriteRequest
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
        return '/v2/enrollment/history/export';
    }
}
