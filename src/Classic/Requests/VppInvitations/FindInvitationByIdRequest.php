<?php

namespace spkm\Jamf\Classic\Requests\VppInvitations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds VPP Invitation by id: GET /vppinvitations/id/{id}.
 */
class FindInvitationByIdRequest extends ClassicGetRequest
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
        return '/vppinvitations/id/'.Path::segment((string) $this->id);
    }
}
