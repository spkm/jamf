<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview;

use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanelText;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get a single Text Panel for a single Enrollment Customization: GET /v1/enrollment-customization/{id}/text/{panel-id}.
 *
 * Get a single Text panel for a single enrollment customization
 */
class GetEnrollmentCustomizationTextV1Request extends GetRequest
{
    protected ?string $dto = GetEnrollmentCustomizationPanelText::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected int|string $panelId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/enrollment-customization/'.Path::segment((string) $this->id).'/text/'.Path::segment((string) $this->panelId);
    }
}
