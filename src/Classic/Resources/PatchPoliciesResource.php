<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\CreatePatchPolicyBySoftwareTitleConfigIdRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\DeletePatchPolicyByIdRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\FindPatchPoliciesByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\FindPatchPoliciesBySoftwareTitleConfigIdRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\FindPatchPoliciesRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\FindPatchPolicyByIdRequest;
use spkm\Jamf\Classic\Requests\PatchPolicies\UpdatePatchPolicyByIdRequest;

/**
 * The patchpolicies endpoints of the Classic API, from Jamf::classic()->patchPolicies().
 */
class PatchPoliciesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindPatchPoliciesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindPatchPolicyByIdRequest($id);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdatePatchPolicyByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeletePatchPolicyByIdRequest($id);
    }

    /**
     * Create a new patch policy by software title configuration id: POST
     * /patchpolicies/softwaretitleconfig/id/{softwaretitleconfigid}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <patch_policy>), or the XML itself.
     */
    public function createPatchPolicyBySoftwareTitleConfigId(int|string $softwaretitleconfigid, array|string $record = []): mixed
    {
        return $this->fetch(new CreatePatchPolicyBySoftwareTitleConfigIdRequest($softwaretitleconfigid, $record));
    }

    /**
     * Deletes a patch policy by id: DELETE /patchpolicies/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePatchPolicyById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePatchPolicyByIdRequest($id, $options));
    }

    /**
     * Finds all patch policies: GET /patchpolicies.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findPatchPolicies(array $options = []): Collection
    {
        return $this->fetch(new FindPatchPoliciesRequest($options));
    }

    /**
     * Display subsets of information for a patch policy: GET /patchpolicies/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPatchPoliciesByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindPatchPoliciesByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Finds all patch policy by software title configuration id: GET
     * /patchpolicies/softwaretitleconfig/id/{softwaretitleconfigid}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPatchPoliciesBySoftwareTitleConfigId(string $softwaretitleconfigid, array $options = []): mixed
    {
        return $this->fetch(new FindPatchPoliciesBySoftwareTitleConfigIdRequest($softwaretitleconfigid, $options));
    }

    /**
     * Finds a patch policy by id: GET /patchpolicies/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPatchPolicyById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindPatchPolicyByIdRequest($id, $options));
    }

    /**
     * Updates an existing patch policy by id: PUT /patchpolicies/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <patch_policy>), or the XML itself.
     */
    public function updatePatchPolicyById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdatePatchPolicyByIdRequest($id, $record));
    }
}
