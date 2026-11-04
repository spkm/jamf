<?php

namespace spkm\Jamf\Classic\Requests\VppInvitations;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a vpp invitation by id: DELETE /vppinvitations/id/{id}.
 */
class DeleteInvitationByIdRequest extends ClassicDeleteRequest
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
