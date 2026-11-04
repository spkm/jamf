<?php

namespace spkm\Jamf\Classic\Requests\MobileDeviceInvitations;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new mobile device invitation by id: POST /mobiledeviceinvitations/id/{id}.
 */
class CreateMobileDeviceInvitationByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'mobile_device_invitation';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <mobile_device_invitation>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/mobiledeviceinvitations/id/'.Path::segment((string) $this->id);
    }
}
