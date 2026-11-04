<?php

namespace spkm\Jamf\Classic\Requests\VppInvitations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display subsets of information for a VPP invitation: GET /vppinvitations/id/{id}/subset/{subset}.
 *
 * Displays information specified with the {subset} parameter for a VPP invitation specified with the {id} parameter.
 * For example, /vppinvitations/id/3/subset/General&Scope&Usages or /vppinvitations/id/3/subset/Usages.
 */
class FindInvitationsByIdSubsetRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $subset, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/vppinvitations/id/'.Path::segment((string) $this->id).'/subset/'.Path::segment((string) $this->subset);
    }
}
