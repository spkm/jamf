<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete the Enrollment messaging for a language: DELETE /v3/enrollment/languages/{languageId}.
 *
 * Delete the enrollment messaging for a language.
 */
class DeleteEnrollmentLanguageV3Request extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $languageId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/enrollment/languages/'.Path::segment((string) $this->languageId);
    }
}
