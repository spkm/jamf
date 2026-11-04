<?php

namespace spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration;

use spkm\Jamf\Pro\Data\ConnectionConfigurationStatusResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Team Viewer Remote Administration connection status: GET /preview/remote-administration-configurations/team-viewer/{id}/status.
 *
 * Returns Team Viewer Remote Administration connection status
 */
class GetRemoteAdministrationConfigurationsTeamViewerStatusPreviewRequest extends GetRequest
{
    protected ?string $dto = ConnectionConfigurationStatusResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/preview/remote-administration-configurations/team-viewer/'.Path::segment((string) $this->id).'/status';
    }
}
