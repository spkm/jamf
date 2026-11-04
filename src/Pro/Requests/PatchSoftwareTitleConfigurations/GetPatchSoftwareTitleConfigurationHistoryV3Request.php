<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Get specified Patch Software Title Configuration history object: GET /v3/patch-software-title-configurations/{id}/history.
 *
 * Gets specified Patch Software Title Configuration history object
 */
class GetPatchSoftwareTitleConfigurationHistoryV3Request extends ListRequest
{
    protected bool $filterable = true;

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
        return '/v3/patch-software-title-configurations/'.Path::segment((string) $this->id).'/history';
    }
}
