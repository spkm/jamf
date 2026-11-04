<?php

namespace spkm\Jamf\Classic\Requests\VppInvitations;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates a vpp invitation by id: PUT /vppinvitations/id/{id}.
 *
 * Name, account, distribution_method required. Email fields required if 'Send Emails' distribution method specified.
 * Usages are ignored in a PUT.
 */
class UpdateInvitationByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'vpp_invitation';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <vpp_invitation>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/vppinvitations/id/'.Path::segment((string) $this->id);
    }
}
