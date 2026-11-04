<?php

namespace spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview;

use spkm\Jamf\Pro\Data\SupervisionIdentity;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Search for sorted and paged Supervision Identities: GET /v1/supervision-identities.
 *
 * Search for sorted and paged supervision identities
 */
class GetSupervisionIdentitiesV1Request extends ListRequest
{
    protected bool $sortable = true;

    protected ?string $dto = SupervisionIdentity::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/supervision-identities';
    }
}
