<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Pro\Data\PatchPolicyDetail;
use spkm\Jamf\Pro\Data\PatchPolicyListView;
use spkm\Jamf\Pro\Data\PatchPolicyV2OnDashboard;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\PatchPolicies\CreatePatchPolicyDashboardV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicies\DeletePatchPolicyDashboardV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicies\GetPatchPoliciesPolicyDetailsV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicies\GetPatchPoliciesV2Request;
use spkm\Jamf\Pro\Requests\PatchPolicies\GetPatchPolicyDashboardV2Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The patch-policies endpoints of the Jamf Pro API, from Jamf::patchPolicies().
 *
 * @extends Builder<PatchPolicyListView>
 */
class PatchPoliciesResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, PatchPolicyListView::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetPatchPoliciesV2Request($query);
    }

    /**
     * Add a patch policy to the dashboard: POST /v2/patch-policies/{id}/dashboard.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createPatchPolicyDashboardV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new CreatePatchPolicyDashboardV2Request($id, $options));
    }

    /**
     * Remove a patch policy from the dashboard: DELETE /v2/patch-policies/{id}/dashboard.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePatchPolicyDashboardV2(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePatchPolicyDashboardV2Request($id, $options));
    }

    /**
     * Retrieve Patch Policies: GET /v2/patch-policies/policy-details.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<PatchPolicyDetail>
     */
    public function getPatchPoliciesPolicyDetailsV2(): PagedResource
    {
        return new PagedResource($this->pro(), PatchPolicyDetail::class, fn (Query $query) => new GetPatchPoliciesPolicyDetailsV2Request($query));
    }

    /**
     * Retrieve Patch Policies: GET /v2/patch-policies.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<PatchPolicyListView>
     */
    public function getPatchPoliciesV2(): PagedResource
    {
        return new PagedResource($this->pro(), PatchPolicyListView::class, fn (Query $query) => new GetPatchPoliciesV2Request($query));
    }

    /**
     * Return whether or not the requested patch policy is on the dashboard: GET /v2/patch-policies/{id}/dashboard.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getPatchPolicyDashboardV2(int|string $id, array $options = []): ?PatchPolicyV2OnDashboard
    {
        return $this->fetch(new GetPatchPolicyDashboardV2Request($id, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
