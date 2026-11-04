<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomization;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete an Enrollment Customization with the supplied id: DELETE /v2/enrollment-customizations/{id}.
 *
 * Deletes an Enrollment Customization with the supplied id
 */
class DeleteEnrollmentCustomizationV2Request extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/enrollment-customizations/'.Path::segment((string) $this->id);
    }
}
