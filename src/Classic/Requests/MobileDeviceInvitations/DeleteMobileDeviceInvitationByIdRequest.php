<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceInvitations;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a mobile device invitation by id: DELETE /mobiledeviceinvitations/id/{id}.
 */
class DeleteMobileDeviceInvitationByIdRequest extends ClassicDeleteRequest
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
        return '/mobiledeviceinvitations/id/'.Path::segment((string) $this->id);
    }
}
