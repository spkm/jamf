<?php

namespace spkm\Jamf\Pro\Requests\AccountGroups;

use spkm\Jamf\Pro\Data\AccountGroupV1;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Get account groups: GET /v1/account-groups.
 *
 * Get all account groups with pagination, sorting, and filtering support.
 */
class GetAccountGroupsV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = AccountGroupV1::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/account-groups';
    }
}
