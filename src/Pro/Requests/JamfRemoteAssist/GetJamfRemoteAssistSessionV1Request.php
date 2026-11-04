<?php

namespace spkm\Jamf\Pro\Requests\JamfRemoteAssist;

use spkm\Jamf\Pro\Data\SessionHistoryItem;
use spkm\Jamf\Requests\GetRequest;

/**
 * Gets session history items: GET /v1/jamf-remote-assist/session.
 *
 * Returns tenants sessions history.
 */
class GetJamfRemoteAssistSessionV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = SessionHistoryItem::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/jamf-remote-assist/session';
    }
}
