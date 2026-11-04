<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use spkm\Jamf\Pro\Data\EnrollmentSettingsV4;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Enrollment object and Re-enrollment settings: GET /v4/enrollment.
 *
 * Gets Enrollment object and re-enrollment settings.
 */
class GetEnrollmentV4Request extends GetRequest
{
    protected ?string $dto = EnrollmentSettingsV4::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v4/enrollment';
    }
}
