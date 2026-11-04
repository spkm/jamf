<?php

namespace spkm\Jamf\Pro\Requests\JamfProNotifications;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete Notifications: DELETE /v1/notifications/{type}/{id}.
 *
 * Deletes notifications with given type and id.
 */
class DeleteNotificationV1Request extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $type, protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/notifications/'.Path::segment((string) $this->type).'/'.Path::segment((string) $this->id);
    }
}
