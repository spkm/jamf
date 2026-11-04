<?php

namespace spkm\Jamf\Pro\Requests\JamfConnect;

use spkm\Jamf\Pro\Data\DeploymentTask;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Search for deployment tasks for a config profile linked to Jamf Connect: GET /v1/jamf-connect/deployments/{id}/tasks.
 *
 * Search for config profiles linked to Jamf Connect
 */
class GetJamfConnectDeploymentTasksV1Request extends ListRequest
{
    protected bool $filterable = true;

    protected bool $sortable = true;

    protected ?string $dto = DeploymentTask::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected int|string $id, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-connect/deployments/'.Path::segment((string) $this->id).'/tasks';
    }
}
