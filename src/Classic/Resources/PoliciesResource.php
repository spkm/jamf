<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\Policies\CreatePolicyByIdRequest;
use spkm\Jamf\Classic\Requests\Policies\DeletePolicyByIdRequest;
use spkm\Jamf\Classic\Requests\Policies\FindPoliciesByCategoryRequest;
use spkm\Jamf\Classic\Requests\Policies\FindPoliciesByIdRequest;
use spkm\Jamf\Classic\Requests\Policies\FindPoliciesByIdSubsetRequest;
use spkm\Jamf\Classic\Requests\Policies\FindPoliciesByNameRequest;
use spkm\Jamf\Classic\Requests\Policies\FindPoliciesByTypeRequest;
use spkm\Jamf\Classic\Requests\Policies\FindPoliciesRequest;
use spkm\Jamf\Classic\Requests\Policies\UpdatePolicyByIdRequest;

/**
 * The policies endpoints of the Classic API, from Jamf::classic()->policies().
 */
class PoliciesResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindPoliciesRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindPoliciesByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreatePolicyByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdatePolicyByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeletePolicyByIdRequest($id);
    }

    /**
     * Creates a new policy by id: POST /policies/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <policy>), or the XML itself.
     */
    public function createPolicyById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreatePolicyByIdRequest($id, $record));
    }

    /**
     * Deletes a policy by id: DELETE /policies/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deletePolicyById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeletePolicyByIdRequest($id, $options));
    }

    /**
     * Finds all policies: GET /policies.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findPolicies(array $options = []): Collection
    {
        return $this->fetch(new FindPoliciesRequest($options));
    }

    /**
     * Finds all policies by category: GET /policies/category/{category}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPoliciesByCategory(string $category, array $options = []): mixed
    {
        return $this->fetch(new FindPoliciesByCategoryRequest($category, $options));
    }

    /**
     * Finds policies by id: GET /policies/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPoliciesById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindPoliciesByIdRequest($id, $options));
    }

    /**
     * Display subsets of information for a policy: GET /policies/id/{id}/subset/{subset}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPoliciesByIdSubset(int|string $id, string $subset, array $options = []): mixed
    {
        return $this->fetch(new FindPoliciesByIdSubsetRequest($id, $subset, $options));
    }

    /**
     * Finds policies by name: GET /policies/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPoliciesByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindPoliciesByNameRequest($name, $options));
    }

    /**
     * Finds all policies by type: GET /policies/createdBy/{createdBy}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findPoliciesByType(string $createdBy, array $options = []): mixed
    {
        return $this->fetch(new FindPoliciesByTypeRequest($createdBy, $options));
    }

    /**
     * Updates an existing policy by id: PUT /policies/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <policy>), or the XML itself.
     */
    public function updatePolicyById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdatePolicyByIdRequest($id, $record));
    }
}
