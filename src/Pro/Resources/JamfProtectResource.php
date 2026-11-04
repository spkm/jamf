<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\DeploymentTask;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\JamfProtectPlan;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\Data\ProtectSettingsResponse;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfProtect\CreateJamfProtectHistoryV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\CreateJamfProtectRegisterV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\DeleteJamfProtectV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\GetJamfProtectDeploymentTasksV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\GetJamfProtectHistoryV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\GetJamfProtectPlansV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\GetJamfProtectV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\ReplaceJamfProtectV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\RetryJamfProtectDeploymentTasksV1Request;
use spkm\Jamf\Pro\Requests\JamfProtect\SyncJamfProtectPlansV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The jamf-protect endpoints of the Jamf Pro API, from Jamf::jamfProtect().
 *
 * @extends Builder<JamfProtectPlan>
 */
class JamfProtectResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, JamfProtectPlan::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetJamfProtectPlansV1Request($query);
    }

    /**
     * Add Jamf Protect history notes: POST /v1/jamf-protect/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createJamfProtectHistoryV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateJamfProtectHistoryV1Request($body, $options));
    }

    /**
     * Register a Jamf Protect API configuration with Jamf Pro: POST /v1/jamf-protect/register.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createJamfProtectRegisterV1(array|JsonSerializable $body, array $options = []): ?ProtectSettingsResponse
    {
        return $this->fetch(new CreateJamfProtectRegisterV1Request($body, $options));
    }

    /**
     * Delete Jamf Protect API registration: DELETE /v1/jamf-protect.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteJamfProtectV1(array $options = []): bool
    {
        return $this->perform(new DeleteJamfProtectV1Request($options));
    }

    /**
     * Search for deployment tasks for a config profile linked to Jamf Protect: GET
     * /v1/jamf-protect/deployments/{id}/tasks.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<DeploymentTask>
     */
    public function getJamfProtectDeploymentTasksV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), DeploymentTask::class, fn (Query $query) => new GetJamfProtectDeploymentTasksV1Request($id, $query));
    }

    /**
     * Get Jamf Protect history: GET /v1/jamf-protect/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getJamfProtectHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetJamfProtectHistoryV1Request($query));
    }

    /**
     * Get all of the previously synced Jamf Protect Plans with information about their associated configuration
     * profile: GET /v1/jamf-protect/plans.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<JamfProtectPlan>
     */
    public function getJamfProtectPlansV1(): PagedResource
    {
        return new PagedResource($this->pro(), JamfProtectPlan::class, fn (Query $query) => new GetJamfProtectPlansV1Request($query));
    }

    /**
     * Jamf Protect integration settings: GET /v1/jamf-protect.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getJamfProtectV1(array $options = []): ?ProtectSettingsResponse
    {
        return $this->fetch(new GetJamfProtectV1Request($options));
    }

    /**
     * Jamf Protect integration settings: PUT /v1/jamf-protect.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceJamfProtectV1(array|JsonSerializable $body, array $options = []): ?ProtectSettingsResponse
    {
        return $this->fetch(new ReplaceJamfProtectV1Request($body, $options));
    }

    /**
     * Request a retry of Protect install tasks: POST /v1/jamf-protect/deployments/{id}/tasks/retry.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function retryJamfProtectDeploymentTasksV1(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new RetryJamfProtectDeploymentTasksV1Request($id, $body, $options));
    }

    /**
     * Sync Plans with Jamf Protect: POST /v1/jamf-protect/plans/sync.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function syncJamfProtectPlansV1(array $options = []): bool
    {
        return $this->perform(new SyncJamfProtectPlansV1Request($options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
