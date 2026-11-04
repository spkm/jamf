<?php

namespace spkm\Jamf\Pro\Requests\JamfProNotifications;

use spkm\Jamf\Pro\Data\NotificationV1;
use spkm\Jamf\Requests\GetRequest;

/**
 * Get Notifications for user and site: GET /v1/notifications.
 *
 * Gets notifications for user and site
 */
class GetNotificationsV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = NotificationV1::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/notifications';
    }
}
