<?php

namespace spkm\Jamf\Classic\Requests\ComputerInvitations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all computer invitations: GET /computerinvitations.
 */
class FindComputerInvitationsRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/computerinvitations';
    }
}
