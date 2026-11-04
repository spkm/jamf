<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use JsonSerializable;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Delete multiple configured languages from User-Initiated Enrollment settings: POST /v3/enrollment/languages/delete-multiple.
 */
class DeleteMultipleEnrollmentLanguagesV3Request extends WriteRequest
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
        return '/v3/enrollment/languages/delete-multiple';
    }
}
