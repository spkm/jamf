<?php

namespace spkm\Jamf\Pro\Requests\VolumePurchasingLocations;

use spkm\Jamf\Pro\Data\VolumePurchasingLocationListView;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Retrieve Volume Purchasing Locations: GET /v1/volume-purchasing-locations.
 *
 * Retrieves Volume Purchasing Locations
 */
class GetVolumePurchasingLocationsV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = VolumePurchasingLocationListView::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/volume-purchasing-locations';
    }
}
