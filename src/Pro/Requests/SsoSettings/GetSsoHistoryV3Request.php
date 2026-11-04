<?php

namespace spkm\Jamf\Pro\Requests\SsoSettings;

use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get SSO history object: GET /v3/sso/history.
 *
 * Gets SSO history object
 */
class GetSsoHistoryV3Request extends ListRequest
{
    protected bool $filterable = true;

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
        return '/v3/sso/history';
    }
}
