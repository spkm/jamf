<?php

namespace spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration;

use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Close a session: POST /preview/remote-administration-configurations/team-viewer/{configurationId}/sessions/{sessionId}/close.
 *
 * Changes the session state from open to close. Closing a session means it is not possible to establish new remote
 * connection between devices
 */
class CloseRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest extends ActionRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $configurationId, protected int|string $sessionId, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/preview/remote-administration-configurations/team-viewer/'.Path::segment((string) $this->configurationId).'/sessions/'.Path::segment((string) $this->sessionId).'/close';
    }
}
