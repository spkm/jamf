<?php

namespace spkm\Jamf\Pro\Requests\TeamViewerRemoteAdministration;

use JsonSerializable;
use Saloon\Enums\Method;
use spkm\Jamf\Pro\Data\ConnectionConfigurationResponse;
use spkm\Jamf\Requests\WriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Update Team Viewer Remote Administration connection configuration: PATCH /preview/remote-administration-configurations/team-viewer/{id}.
 *
 * Updates Team Viewer Remote Administration connection configuration
 */
class UpdateRemoteAdministrationConfigurationsTeamViewerPreviewRequest extends WriteRequest
{
    protected Method $method = Method::PATCH;

    protected string $responseShape = self::ONE;

    protected ?string $dto = ConnectionConfigurationResponse::class;

    /**
     * @param  array<mixed>|JsonSerializable  $body  The record, as an array of Jamf's field names or a model.
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array|JsonSerializable $body, array $options = [])
    {
        $this->record = $body;
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/preview/remote-administration-configurations/team-viewer/'.Path::segment((string) $this->id);
    }
}
