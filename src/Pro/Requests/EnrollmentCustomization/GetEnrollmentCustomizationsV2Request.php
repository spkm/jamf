<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomization;

use spkm\Jamf\Pro\Data\EnrollmentCustomizationV2;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Retrieve sorted and paged Enrollment Customizations: GET /v2/enrollment-customizations.
 *
 * Retrieves sorted and paged Enrollment Customizations
 */
class GetEnrollmentCustomizationsV2Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = EnrollmentCustomizationV2::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/enrollment-customizations';
    }
}
