<?php

namespace spkm\Jamf\Pro\Resources;

use JsonSerializable;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\ConnectionConfigurationResponse;
use spkm\Jamf\Pro\Data\ConnectionConfigurationStatusResponse;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Pro\Data\SessionDetails;
use spkm\Jamf\Pro\Data\SessionStatus;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\CloseRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\CreateRemoteAdministrationConfigurationsTeamViewerPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\CreateRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\DeleteRemoteAdministrationConfigurationsTeamViewerPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerSessionStatusPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\GetRemoteAdministrationConfigurationsTeamViewerStatusPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\ResendRemoteAdministrationConfigurationsTeamViewerSessionNotificationPreviewRequest;
use spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration\UpdateRemoteAdministrationConfigurationsTeamViewerPreviewRequest;
use spkm\Jamf\Query\Query;
use spkm\Jamf\Resources\BaseResource;
use spkm\Jamf\Resources\PagedResource;

/**
 * The team-viewer-remote-administration endpoints of the Jamf Pro API, from Jamf::teamViewerRemoteAdministration().
 *
 * @extends BaseResource<Data>
 */
class TeamViewerRemoteAdministrationResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Close a session: POST
     * /preview/remote-administration-configurations/team-viewer/{configurationId}/sessions/{sessionId}/close.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function closeRemoteAdministrationConfigurationsTeamViewerSessionPreview(int|string $configurationId, int|string $sessionId, array $options = []): bool
    {
        return $this->perform(new CloseRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest($configurationId, $sessionId, $options));
    }

    /**
     * Create Team Viewer Remote Administration connection configuration: POST
     * /preview/remote-administration-configurations/team-viewer.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createRemoteAdministrationConfigurationsTeamViewerPreview(array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateRemoteAdministrationConfigurationsTeamViewerPreviewRequest($body, $options));
    }

    /**
     * Create a new session: POST
     * /preview/remote-administration-configurations/team-viewer/{configurationId}/sessions.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function createRemoteAdministrationConfigurationsTeamViewerSessionsPreview(int|string $configurationId, array|JsonSerializable $body, array $options = []): ?HrefResponse
    {
        return $this->fetch(new CreateRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest($configurationId, $body, $options));
    }

    /**
     * Delete Team Viewer Remote Administration connection configuration: DELETE
     * /preview/remote-administration-configurations/team-viewer/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteRemoteAdministrationConfigurationsTeamViewerPreview(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteRemoteAdministrationConfigurationsTeamViewerPreviewRequest($id, $options));
    }

    /**
     * Get Team Viewer Remote Administration connection configuration: GET
     * /preview/remote-administration-configurations/team-viewer/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getRemoteAdministrationConfigurationsTeamViewerPreview(int|string $id, array $options = []): ?ConnectionConfigurationResponse
    {
        return $this->fetch(new GetRemoteAdministrationConfigurationsTeamViewerPreviewRequest($id, $options));
    }

    /**
     * Get a session by its ID: GET
     * /preview/remote-administration-configurations/team-viewer/{configurationId}/sessions/{sessionId}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getRemoteAdministrationConfigurationsTeamViewerSessionPreview(int|string $configurationId, int|string $sessionId, array $options = []): ?SessionDetails
    {
        return $this->fetch(new GetRemoteAdministrationConfigurationsTeamViewerSessionPreviewRequest($configurationId, $sessionId, $options));
    }

    /**
     * Get a session status by its ID: GET
     * /preview/remote-administration-configurations/team-viewer/{configurationId}/sessions/{sessionId}/status.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getRemoteAdministrationConfigurationsTeamViewerSessionStatusPreview(int|string $configurationId, int|string $sessionId, array $options = []): ?SessionStatus
    {
        return $this->fetch(new GetRemoteAdministrationConfigurationsTeamViewerSessionStatusPreviewRequest($configurationId, $sessionId, $options));
    }

    /**
     * Get a paginated list of sessions: GET
     * /preview/remote-administration-configurations/team-viewer/{configurationId}/sessions.
     *
     * A builder over the list: filter, sort, sections, get(), lazy() and the rest.
     *
     * @return PagedResource<SessionDetails>
     */
    public function getRemoteAdministrationConfigurationsTeamViewerSessionsPreview(int|string $configurationId): PagedResource
    {
        return new PagedResource($this->pro(), SessionDetails::class, fn (Query $query) => new GetRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest($configurationId, $query));
    }

    /**
     * Get Team Viewer Remote Administration connection status: GET
     * /preview/remote-administration-configurations/team-viewer/{id}/status.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getRemoteAdministrationConfigurationsTeamViewerStatusPreview(int|string $id, array $options = []): ?ConnectionConfigurationStatusResponse
    {
        return $this->fetch(new GetRemoteAdministrationConfigurationsTeamViewerStatusPreviewRequest($id, $options));
    }

    /**
     * Resend nofications for a session: POST
     * /preview/remote-administration-configurations/team-viewer/{configurationId}/sessions/{sessionId}/resend-notification.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function resendRemoteAdministrationConfigurationsTeamViewerSessionNotificationPreview(int|string $configurationId, int|string $sessionId, array $options = []): bool
    {
        return $this->perform(new ResendRemoteAdministrationConfigurationsTeamViewerSessionNotificationPreviewRequest($configurationId, $sessionId, $options));
    }

    /**
     * Update Team Viewer Remote Administration connection configuration: PATCH
     * /preview/remote-administration-configurations/team-viewer/{id}.
     *
     * @param  array<mixed>|JsonSerializable  $body
     * @param  array<string, mixed>  $options  Query options.
     */
    public function updateRemoteAdministrationConfigurationsTeamViewerPreview(int|string $id, array|JsonSerializable $body, array $options = []): ?ConnectionConfigurationResponse
    {
        return $this->fetch(new UpdateRemoteAdministrationConfigurationsTeamViewerPreviewRequest($id, $body, $options));
    }

    private function pro(): ProConnector
    {
        $connector = $this->connector();

        return $connector instanceof ProConnector ? $connector : throw new \LogicException('A Jamf Pro resource needs a Jamf Pro connector.');
    }
}
