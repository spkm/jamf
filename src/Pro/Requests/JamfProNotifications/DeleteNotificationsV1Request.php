<?php

namespace spkm\Jamf\Pro\Requests\JamfProNotifications;

use spkm\Jamf\Requests\DeleteRequest;

/**
 * Dismiss all notifications: DELETE /v1/notifications.
 *
 * Dismisses all dismissible notifications for the user and site.
 */
class DeleteNotificationsV1Request extends DeleteRequest
{
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
