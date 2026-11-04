<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomization;

use JsonSerializable;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Add Enrollment Customization history object notes: POST /v2/enrollment-customizations/{id}/history.
 *
 * Adds enrollment customization history object notes
 */
class CreateEnrollmentCustomizationHistoryV2Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = ObjectHistory::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/enrollment-customizations/'.Path::segment((string) $this->id).'/history';
    }
}
