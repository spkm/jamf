<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use spkm\Jamf\Pro\Data\EnrollmentAccessGroupPreview;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve the configured LDAP groups configured for User-Initiated Enrollment: GET /v3/enrollment/access-groups/{id}.
 *
 * Retrieves the configured LDAP groups configured for User-Initiated Enrollment.
 */
class GetEnrollmentAccessGroupV3Request extends GetRequest
{
    protected ?string $dto = EnrollmentAccessGroupPreview::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v3/enrollment/access-groups/'.Path::segment((string) $this->id);
    }
}
