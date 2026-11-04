<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomizationPreview;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a single Panel from an Enrollment Customization: DELETE /v1/enrollment-customization/{id}/all/{panel-id}.
 *
 * Delete a single panel from an Enrollment Customization
 */
class DeleteEnrollmentCustomizationAllV1Request extends DeleteRequest
{
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
