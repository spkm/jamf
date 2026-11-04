<?php

namespace spkm\Jamf\Classic\Requests\LdapServers;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new ldap server by id: POST /ldapservers/id/{id}.
 */
class CreateLDAPServerByIdRequest extends ClassicWriteRequest
{
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
