<?php

namespace spkm\Jamf\Pro\Requests\ReEnrollmentPreview;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Requests\WriteRequest;

/**
 * Add specified Re-enrollment history object notes: POST /v1/reenrollment/history.
 *
 * Adds specified Re-enrollment history object notes
 */
class CreateReenrollmentHistoryV1Request extends WriteRequest
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
        return '/v1/reenrollment/history';
    }
}
