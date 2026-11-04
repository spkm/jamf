<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanelText;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update a single Text Panel for a single Enrollment Customization: PUT /v1/enrollment-customization/{id}/text/{panel-id}.
 *
 * Update a single Text panel for a single enrollment customization
 */
class ReplaceEnrollmentCustomizationTextV1Request extends WriteRequest
{
    protected Method $method = Method::PUT;

    protected string $responseShape = self::ONE;

    protected ?string $dto = GetEnrollmentCustomizationPanelText::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected int|string $panelId, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/enrollment-customization/'.Path::segment((string) $this->id).'/text/'.Path::segment((string) $this->panelId);
    }
}
