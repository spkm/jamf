<?php

namespace spkm\Jamf\Pro\Requests\Sites;

use spkm\Jamf\Pro\Data\SiteObject;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Find and filter site objects for a site ID: GET /v1/sites/{id}/objects.
 *
 * Find site objects for Site ID, with the ability to filter out different object types and object IDs for the site ID
 */
class GetSiteObjectsV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = SiteObject::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected int|string $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/sites/'.Path::segment((string) $this->id).'/objects';
    }
}
