<?php

namespace spkm\Jamf\Classic\Requests\VppInvitations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all VPP Invitations: GET /vppinvitations.
 */
class FindVPPAdminInvitationRequest extends ClassicGetRequest
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
        return '/vppinvitations';
    }
}
