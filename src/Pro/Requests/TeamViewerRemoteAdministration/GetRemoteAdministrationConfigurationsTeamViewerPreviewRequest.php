<?php

namespace spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration;

use spkm\Jamf\Pro\Data\ConnectionConfigurationResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Team Viewer Remote Administration connection configuration: GET /preview/remote-administration-configurations/team-viewer/{id}.
 *
 * Returns Team Viewer Remote Administration connection configuration
 */
class GetRemoteAdministrationConfigurationsTeamViewerPreviewRequest extends GetRequest
{
    protected ?string $dto = ConnectionConfigurationResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/preview/remote-administration-configurations/team-viewer/'.Path::segment((string) $this->id);
    }
}
