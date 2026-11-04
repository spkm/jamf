<?php

namespace spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration;

use spkm\Jamf\Pro\Data\SessionDetails;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get a session by its ID: GET /preview/remote-administration-configurations/team-viewer/{configurationId}/sessions/{sessionId}.
 *
 * Returns a session details if found.
 */
class GetRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest extends GetRequest
{
    protected ?string $dto = SessionDetails::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $configurationId, protected int|string $sessionId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/preview/remote-administration-configurations/team-viewer/'.Path::segment((string) $this->configurationId).'/sessions/'.Path::segment((string) $this->sessionId);
    }
}
