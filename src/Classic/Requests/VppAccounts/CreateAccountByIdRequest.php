<?php

namespace spkm\Jamf\Classic\Requests\VppAccounts;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new vpp account by id: POST /vppaccounts/id/{id}.
 *
 * service_token and name are required. account_name and expiration_date are set from the service token
 */
class CreateAccountByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'vpp_account';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <vpp_account>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/vppaccounts/id/'.Path::segment((string) $this->id);
    }
}
