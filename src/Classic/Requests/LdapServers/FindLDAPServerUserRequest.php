<?php

namespace spkm\Jamf\Classic\Requests\LdapServers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display information for matching users for an ldap server: GET /ldapservers/id/{id}/user/{user}.
 *
 * Displays information about matching users for an ldap server specified with the {id} parameter. Server lookup by
 * name is also supported. For example, /ldapservers/id/3/user/Fred or /ldapservers/name/ADServer/user/Sam.
 */
class FindLDAPServerUserRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $user, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/ldapservers/id/'.Path::segment((string) $this->id).'/user/'.Path::segment((string) $this->user);
    }
}
