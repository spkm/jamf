<?php

namespace spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration;

use spkm\Jamf\Pro\Data\SessionDetails;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Requests\ListRequest;
use spkm\Jamf\Support\Path;

/**
 * Get a paginated list of sessions: GET /preview/remote-administration-configurations/team-viewer/{configurationId}/sessions.
 *
 * Returns a paginated list of sessions for a given configuration ID
 */
class GetRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest extends ListRequest
{
    protected bool $filterable = true;

    protected ?string $dto = SessionDetails::class;

    /**
     * @param  Query|array<string, mixed>  $query  The filter, sort, sections and paging, or the query parameters as an array.
     */
    public function __construct(protected int|string $configurationId, Query|array $query = [])
    {
        parent::__construct($query);
    }

    public function resolveEndpoint(): string
    {
        return '/preview/remote-administration-configurations/team-viewer/'.Path::segment((string) $this->configurationId).'/sessions';
    }
}
