<?php

namespace spkm\Jamf\Pro\Requests\JamfRemoteAssist;

use spkm\Jamf\Pro\Data\SessionHistoryItemWithDetails;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Gets single session history item: GET /v1/jamf-remote-assist/session/{id}.
 *
 * Returns tenants session history for specific session.
 */
class GetJamfRemoteAssistSessionByIdV1Request extends GetRequest
{
    protected ?string $dto = SessionHistoryItemWithDetails::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-remote-assist/session/'.Path::segment((string) $this->id);
    }
}
