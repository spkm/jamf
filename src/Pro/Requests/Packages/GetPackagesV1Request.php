<?php

namespace spkm\Jamf\Pro\Requests\Packages;

use spkm\Jamf\Pro\Data\Package;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Retrieve Packages: GET /v1/packages.
 *
 * Retrieves packages
 */
class GetPackagesV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = Package::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/packages';
    }
}
