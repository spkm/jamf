<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Pro\Data\DeploymentTask;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\LinkedConnectProfile;
use spkm\Jamf\Pro\Data\ObjectHistory;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfConnect\CreateJamfConnectHistoryV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\GetJamfConnectConfigProfilesV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\GetJamfConnectDeploymentTasksV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\GetJamfConnectHistoryV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\GetJamfConnectV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\ReplaceJamfConnectConfigProfileV1Request;
use spkm\Jamf\Pro\Requests\JamfConnect\RetryJamfConnectDeploymentTasksV1Request;
use spkm\Jamf\Query\Builder;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\JamfRequest;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Resources\PagedResource;

/**
 * The jamf-connect endpoints of the Jamf Pro API, from Jamf::jamfConnect().
 *
 * @extends Builder<ObjectHistory>
 */
class JamfConnectResource extends Builder
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, ObjectHistory::class);
    }

    protected function listRequest(Query $query): ListRequest
    {
        return new GetJamfConnectHistoryV1Request($query);
    }

    protected function createRequest(array $body): JamfRequest
    {
        return new CreateJamfConnectHistoryV1Request($body);
    }

    /**
     * Add Jamf Connect history notes: POST /v1/jamf-connect/history.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createJamfConnectHistoryV1(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateJamfConnectHistoryV1Request($body, $options));
    }

    /**
     * Search for config profiles linked to Jamf Connect: GET /v1/jamf-connect/config-profiles.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<LinkedConnectProfile>
     */
    public function getJamfConnectConfigProfilesV1(): PagedResource
    {
        return new PagedResource($this->pro(), LinkedConnectProfile::class, fn (Query $query) => new GetJamfConnectConfigProfilesV1Request($query));
    }

    /**
     * Search for deployment tasks for a config profile linked to Jamf Connect: GET
     * /v1/jamf-connect/deployments/{id}/tasks.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<DeploymentTask>
     */
    public function getJamfConnectDeploymentTasksV1(int|string $id): PagedResource
    {
        return new PagedResource($this->pro(), DeploymentTask::class, fn (Query $query) => new GetJamfConnectDeploymentTasksV1Request($id, $query));
    }

    /**
     * Get Jamf Connect history: GET /v1/jamf-connect/history.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<ObjectHistory>
     */
    public function getJamfConnectHistoryV1(): PagedResource
    {
        return new PagedResource($this->pro(), ObjectHistory::class, fn (Query $query) => new GetJamfConnectHistoryV1Request($query));
    }

    /**
     * Get the Jamf Connect settings that you have access to see: GET /v1/jamf-connect.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getJamfConnectV1(array $options = []): bool
    {
        return $this->perform(new GetJamfConnectV1Request($options));
    }

    /**
     * Update the way the Jamf Connect app gets updated on computers within scope of the associated configuration
     * profile: PUT /v1/jamf-connect/config-profiles/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function replaceJamfConnectConfigProfileV1(int|string $id, array|JsonSerializable $body = [], array $options = []): ?LinkedConnectProfile
    {
        return $this->fetch(new ReplaceJamfConnectConfigProfileV1Request($id, $body, $options));
    }

    /**
     * Request a retry of Connect install tasks: POST /v1/jamf-connect/deployments/{id}/tasks/retry.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function retryJamfConnectDeploymentTasksV1(int|string $id, array|JsonSerializable $body, array $options = []): bool
    {
        return $this->perform(new RetryJamfConnectDeploymentTasksV1Request($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
