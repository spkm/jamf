<?php

namespace spkm\Jamf\Pro\Requests\PatchPolicies;

use spkm\Jamf\Pro\Data\PatchPolicyDetail;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;

/**
 * Retrieve Patch Policies: GET /v2/patch-policies/policy-details.
 *
 * Retrieves a list of patch policies.
 */
class GetPatchPoliciesPolicyDetailsV2Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = PatchPolicyDetail::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v2/patch-policies/policy-details';
    }
}
