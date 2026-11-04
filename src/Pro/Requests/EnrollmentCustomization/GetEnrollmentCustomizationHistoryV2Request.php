<?php

namespace spkm\Jamf\Pro\Requests\EnrollmentCustomization;

use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Get sorted and paged Enrollment Customization history objects: GET /v2/enrollment-customizations/{id}/history.
 *
 * Gets sorted and paged enrollment customization history objects
 */
class GetEnrollmentCustomizationHistoryV2Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = ObjectHistory::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected int|string $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/enrollment-customizations/'.Path::segment((string) $this->id).'/history';
    }
}
