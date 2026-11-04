<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview;

use spkm\Jamf\Pro\Data\GetEnrollmentCustomizationPanel;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get a single Panel for a single Enrollment Customization: GET /v1/enrollment-customization/{id}/all/{panel-id}.
 *
 * Get a single panel for a single enrollment customization
 */
class GetEnrollmentCustomizationAllByPanelIdV1Request extends GetRequest
{
    protected ?string $dto = GetEnrollmentCustomizationPanel::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected int|string $panelId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/enrollment-customization/'.Path::segment((string) $this->id).'/all/'.Path::segment((string) $this->panelId);
    }
}
