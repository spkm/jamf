<?php

namespace spkm\Jamf\Classic\Requests\VppAccounts;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates a vpp account by id: PUT /vppaccounts/id/{id}.
 *
 * service_token may not match another vpp account. account_name and expiration_date are set from the service token
 */
class UpdateAccountByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
