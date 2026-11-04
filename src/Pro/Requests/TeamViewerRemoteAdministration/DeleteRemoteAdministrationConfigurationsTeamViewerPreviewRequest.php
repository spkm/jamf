<?php

namespace spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete Team Viewer Remote Administration connection configuration: DELETE /preview/remote-administration-configurations/team-viewer/{id}.
 *
 * Deletes Team Viewer Remote Administration connection configuration
 */
class DeleteRemoteAdministrationConfigurationsTeamViewerPreviewRequest extends DeleteRequest
{
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
