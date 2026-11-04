<?php

namespace spkm\Jamf\Pro\Requests\JamfProServerUrlPreview;

use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get Jamf Pro Server URL settings history: GET /v1/jamf-pro-server-url/history.
 *
 * Gets Jamf Pro Server URL settings history
 */
class GetJamfProServerUrlHistoryV1Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = ObjectHistory::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-pro-server-url/history';
    }
}
