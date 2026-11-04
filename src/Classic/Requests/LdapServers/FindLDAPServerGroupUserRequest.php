<?php

namespace spkm\Jamf\Classic\Requests\LdapServers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display information about user membership in a group for an ldap server: GET /ldapservers/id/{id}/group/{group}/user/{user}.
 *
 * Displays information about user membership in a group for an ldap server specified with the {id} parameter. Exact
 * matches are used for group and user. Multiple users separated by a comma are allowed. Server lookup by name is also
 * supported. For example, /ldapservers/id/3/group/staff/user/Fred, /ldapservers/name/ADServer/group/staff/user/Sam or
 * /ldapservers/name/ADServer/group/staff/user/Fred,Sam.
 */
class FindLDAPServerGroupUserRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $group, protected string $user, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/ldapservers/id/'.Path::segment((string) $this->id).'/group/'.Path::segment((string) $this->group).'/user/'.Path::segment((string) $this->user);
    }
}
