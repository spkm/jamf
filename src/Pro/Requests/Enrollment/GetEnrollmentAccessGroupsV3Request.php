<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use spkm\Jamf\Pro\Data\EnrollmentAccessGroupPreview;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Retrieve the configured LDAP groups configured for User-Initiated Enrollment: GET /v3/enrollment/access-groups.
 *
 * Retrieves the configured LDAP groups configured for User-Initiated Enrollment.
 */
class GetEnrollmentAccessGroupsV3Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = EnrollmentAccessGroupPreview::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v3/enrollment/access-groups';
    }
}
