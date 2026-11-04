<?php

namespace spkm\Jamf\Pro\Requests\PatchPolicyLogs;

use spkm\Jamf\Pro\Data\PatchPolicyLogV2;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve Patch Policy Logs: GET /v2/patch-policies/{id}/logs.
 *
 * Retrieves Patch Policy Logs
 */
class GetPatchPolicyLogsV2Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = PatchPolicyLogV2::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected int|string $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/patch-policies/'.Path::segment((string) $this->id).'/logs';
    }
}
