<?php

namespace spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration;

use spkm\Jamf\Requests\ActionRequest;
use spkm\Jamf\Support\Path;

/**
 * Resend nofications for a session: POST /preview/remote-administration-configurations/team-viewer/{configurationId}/sessions/{sessionId}/resend-notification.
 *
 * Resends configured notifications (e.g. Self Service push notifications).
 */
class ResendRemoteAdministrationConfigurationsTeamViewerSessionNotificationPreviewRequest extends ActionRequest
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
        return '/preview/remote-administration-configurations/team-viewer/'.Path::segment((string) $this->configurationId).'/sessions/'.Path::segment((string) $this->sessionId).'/resend-notification';
    }
}
