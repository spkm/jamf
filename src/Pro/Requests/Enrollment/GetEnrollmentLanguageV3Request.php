<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use spkm\Jamf\Pro\Data\EnrollmentProcessTextObject;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve the Enrollment messaging for a language: GET /v3/enrollment/languages/{languageId}.
 *
 * Retrieves the enrollment messaging for a language.
 */
class GetEnrollmentLanguageV3Request extends GetRequest
{
    protected ?string $dto = EnrollmentProcessTextObject::class;

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
