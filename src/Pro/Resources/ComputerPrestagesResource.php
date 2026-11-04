<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\GetComputerPrestageV3;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\PrestageScopeResponseV2;
use spkm\Jamf\Pro\Data\PrestageScopeV2;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ComputerPrestages\CreateComputerPrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\CreateComputerPrestagesV3Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\DeleteComputerPrestageV3Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\DeleteMultipleComputerPrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\GetComputerPrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\GetComputerPrestagesScopeV2Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\GetComputerPrestagesV3Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\GetComputerPrestageV3Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\ReplaceComputerPrestageScopeV2Request;
use spkm\Jamf\Pro\Requests\ComputerPrestages\ReplaceComputerPrestageV3Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The computer-prestages endpoints of the Jamf Pro API, from Jamf::computerPrestages().
 *
 * @extends Builder<GetComputerPrestageV3>
 */
class ComputerPrestagesResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, GetComputerPrestageV3::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetComputerPrestagesV3Request($query);
    }

    protected function itemRequest(int|string $id): JamfRequest
    {
        return new GetComputerPrestageV3Request($id);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateComputerPrestagesV3Request($body);
    }

    protected function updateRequest(int|string $id, array $body): JamfRequest
    {
        return new ReplaceComputerPrestageV3Request($id, $body);
    }

    protected function deleteRequest(int|string $id): JamfRequest
    {
        return new DeleteComputerPrestageV3Request($id);
    }

    /**
     * Add device Scope for a specific Computer Prestage: POST /v2/computer-prestages/{id}/scope.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputerPrestageScopeV2(int|string $id, array|JsonSerializable $body, array $options = []): ?PrestageScopeResponseV2
    {
        return $this->fetch(new CreateComputerPrestageScopeV2Request($id, $body, $options));
    }

    /**
     * Create a Computer Prestage: POST /v3/computer-prestages.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createComputerPrestagesV3(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateComputerPrestagesV3Request($body, $options));
    }

    /**
     * Delete a Computer Prestage with the supplied id: DELETE /v3/computer-prestages/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteComputerPrestageV3(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteComputerPrestageV3Request($id, $options));
    }

    /**
     * Remove device Scope for a specific Computer Prestage: POST /v2/computer-prestages/{id}/scope/delete-multiple.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteMultipleComputerPrestageScopeV2(int|string $id, array|JsonSerializable $body, array $options = []): ?PrestageScopeResponseV2
    {
        return $this->fetch(new DeleteMultipleComputerPrestageScopeV2Request($id, $body, $options));
    }

    /**
     * Get device Scope for a specific Computer Prestage: GET /v2/computer-prestages/{id}/scope.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerPrestageScopeV2(int|string $id, array $options = []): ?PrestageScopeResponseV2
    {
        return $this->fetch(new GetComputerPrestageScopeV2Request($id, $options));
    }

    /**
     * Retrieve a Computer Prestage with the supplied id: GET /v3/computer-prestages/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerPrestageV3(int|string $id, array $options = []): ?GetComputerPrestageV3
    {
        return $this->fetch(new GetComputerPrestageV3Request($id, $options));
    }

    /**
     * Get all device Scope for all Computer Prestages: GET /v2/computer-prestages/scope.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getComputerPrestagesScopeV2(array $options = []): ?PrestageScopeV2
    {
        return $this->fetch(new GetComputerPrestagesScopeV2Request($options));
    }

    /**
     * Get sorted and paged Computer Prestages: GET /v3/computer-prestages.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<GetComputerPrestageV3>
     */
    public function getComputerPrestagesV3(): PagedResource
    {
        return new PagedResource($this->pro(), GetComputerPrestageV3::class, fn (Query $query) => new GetComputerPrestagesV3Request($query));
    }

    /**
     * Replace device Scope for a specific Computer Prestage: PUT /v2/computer-prestages/{id}/scope.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceComputerPrestageScopeV2(int|string $id, array|JsonSerializable $body, array $options = []): ?PrestageScopeResponseV2
    {
        return $this->fetch(new ReplaceComputerPrestageScopeV2Request($id, $body, $options));
    }

    /**
     * Update a Computer Prestage: PUT /v3/computer-prestages/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceComputerPrestageV3(int|string $id, array|JsonSerializable $body, array $options = []): ?GetComputerPrestageV3
    {
        return $this->fetch(new ReplaceComputerPrestageV3Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
