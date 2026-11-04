<?php

namespace spkm\Jamf\Classic\Requests\LdapServers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds ldap servers by name: GET /ldapservers/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindLDAPServersByNameRequest extends ClassicGetRequest
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
        return '/ldapservers/name/'.Path::segment((string) $this->name);
    }
}
