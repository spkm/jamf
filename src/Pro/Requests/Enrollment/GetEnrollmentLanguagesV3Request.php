<?php

namespace spkm\Jamf\Pro\Requests\Enrollment;

use spkm\Jamf\Pro\Data\EnrollmentProcessTextObject;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get an array of the language codes that have Enrollment messaging: GET /v3/enrollment/languages.
 *
 * Returns an array of the language codes that have enrollment messaging currently configured.
 */
class GetEnrollmentLanguagesV3Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = EnrollmentProcessTextObject::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v3/enrollment/languages';
    }
}
