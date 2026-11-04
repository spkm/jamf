<?php

namespace spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration;

use JsonSerializable;
use spkm\Jamf\Pro\Data\HrefResponse;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Create a new session: POST /preview/remote-administration-configurations/team-viewer/{configurationId}/sessions.
 *
 * Creates a new Team Viewer session to be used to establish a remote connection
 */
class CreateRemoteAdministrationConfigurationsTeamViewerSessionsPreviewRequest extends WriteRequest
{
    protected string $responseShape = self::ONE;

    protected ?string $dto = HrefResponse::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $configurationId, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/preview/remote-administration-configurations/team-viewer/'.Path::segment((string) $this->configurationId).'/sessions';
    }
}
