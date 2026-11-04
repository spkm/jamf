<?php

namespace spkm\Jamf\Classic\Requests\LdapServers;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing ldap server by id: PUT /ldapservers/id/{id}.
 */
class UpdateLDAPServerByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

    protected string $root = 'ldap_server';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <ldap_server>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/ldapservers/id/'.Path::segment((string) $this->id);
    }
}
