<?php

namespace spkm\Jamf\Pro\Requests\VolumePurchasingLocations;

use spkm\Jamf\Pro\Data\VolumePurchasingContent;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve the Volume Purchasing Content for the Volume Purchasing Location with the supplied id: GET /v1/volume-purchasing-locations/{id}/content.
 *
 * Retrieves the Volume Purchasing Content for the Volume Purchasing Location with the supplied id
 */
class GetVolumePurchasingLocationContentV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = VolumePurchasingContent::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected int|string $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/volume-purchasing-locations/'.Path::segment((string) $this->id).'/content';
    }
}
