<?php

namespace spkm\Jamf\Classic\Requests\ComputerInvitations;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a computer invitation by id: DELETE /computerinvitations/id/{id}.
 */
class DeleteComputerInvitationByIdRequest extends ClassicDeleteRequest
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
        return '/computerinvitations/id/'.Path::segment((string) $this->id);
    }
}
