<?php

namespace spkm\Jamf\Classic\Requests\ComputerInvitations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds computer invitations by name: GET /computerinvitations/name/{name}.
 *
 * You can POST and DELETE using this resource URL. Name is assumed to be the invitation identifier.
 */
class FindComputerInvitationsByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerinvitations/name/'.Path::segment((string) $this->name);
    }
}
