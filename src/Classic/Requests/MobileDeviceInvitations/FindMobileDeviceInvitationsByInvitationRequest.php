<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceInvitations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds mobile device invitations by invitation: GET /mobiledeviceinvitations/invitation/{invitation}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindMobileDeviceInvitationsByInvitationRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $invitation, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceinvitations/invitation/'.Path::segment((string) $this->invitation);
    }
}
