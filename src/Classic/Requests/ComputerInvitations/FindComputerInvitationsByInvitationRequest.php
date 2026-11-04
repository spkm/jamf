<?php

namespace spkm\Jamf\Classic\Requests\ComputerInvitations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer invitations by invitation: GET /computerinvitations/invitation/{invitation}.
 *
 * You can POST and DELETE using this resource URL.
 */
class FindComputerInvitationsByInvitationRequest extends ClassicGetRequest
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
        return '/computerinvitations/invitation/'.Path::segment((string) $this->invitation);
    }
}
