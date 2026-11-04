<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview;

use JsonSerializable;
use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanelText;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Create a Text Panel for a single Enrollment Customization: POST /v1/enrollment-customization/{id}/text.
 *
 * Create a Text panel for a single enrollment customization
 */
class CreateEnrollmentCustomizationTextV1Request extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = GetEnrollmentCustomizationPanelText::class;

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
        return '/v1/enrollment-customization/'.Path::segment((string) $this->id).'/text';
    }
}
