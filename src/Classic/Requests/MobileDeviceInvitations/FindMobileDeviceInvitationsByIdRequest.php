<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceInvitations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device invitations by id: GET /mobiledeviceinvitations/id/{id}.
 */
class FindMobileDeviceInvitationsByIdRequest extends ClassicGetRequest
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
