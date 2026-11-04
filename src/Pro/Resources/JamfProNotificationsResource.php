<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\NotificationV1;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\JamfProNotifications\DeleteNotificationsV1Request;
use spkm\Jamf\Pro\Requests\JamfProNotifications\DeleteNotificationV1Request;
use spkm\Jamf\Pro\Requests\JamfProNotifications\GetNotificationsV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The jamf-pro-notifications endpoints of the Jamf Pro API, from Jamf::jamfProNotifications().
 *
 * @extends BaseResource<Data>
 */
class JamfProNotificationsResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Delete Notifications: DELETE /v1/notifications/{type}/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteNotificationV1(string $type, int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteNotificationV1Request($type, $id, $options));
    }

    /**
     * Dismiss all notifications: DELETE /v1/notifications.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteNotificationsV1(array $options = []): bool
    {
        return $this->perform(new DeleteNotificationsV1Request($options));
    }

    /**
     * Get Notifications for user and site: GET /v1/notifications.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, NotificationV1>
     */
    public function getNotificationsV1(array $options = []): Collection
    {
        return $this->fetch(new GetNotificationsV1Request($options));
    }
}
