<?php

namespace spkm\Jamf\Classic\Requests\LdapServers;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Display information for matching groups for an ldap server: GET /ldapservers/id/{id}/group/{group}.
 *
 * Displays information about matching groups for an ldap server specified with the {id} parameter. Server lookup by
 * name is also supported. For example, /ldapservers/id/3/group/Staff or /ldapservers/name/ADServer/group/ITStaff.
 */
class FindLDAPServerGroupRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, protected string $group, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/ldapservers/id/'.Path::segment((string) $this->id).'/group/'.Path::segment((string) $this->group);
    }
}
