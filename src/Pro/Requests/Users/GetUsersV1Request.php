<?php

namespace spkm\Jamf\Pro\Requests\Users;

use spkm\Jamf\Pro\Data\User;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Retrieve users with pagination and filtering: GET /v1/users.
 *
 * Retrieves a paginated list of users with optional filtering and sorting.
 */
class GetUsersV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = User::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/users';
    }
}
