<?php

namespace spkm\Jamf\Classic\Requests\ComputerInvitations;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new computer invitation by id: POST /computerinvitations/id/{id}.
 */
class CreateComputerInvitationByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'computer_invitation';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <computer_invitation>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/computerinvitations/id/'.Path::segment((string) $this->id);
    }
}
