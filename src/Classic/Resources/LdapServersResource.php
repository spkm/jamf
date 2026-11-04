<?php

namespace spkm\Jamf\Classic\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Classic\ClassicConnector;
use spkm\Jamf\Classic\Requests\ClassicRequest;
use spkm\Jamf\Classic\Requests\LdapServers\CreateLDAPServerByIdRequest;
use spkm\Jamf\Classic\Requests\LdapServers\DeleteLDAPServerByIdRequest;
use spkm\Jamf\Classic\Requests\LdapServers\FindLDAPServerGroupRequest;
use spkm\Jamf\Classic\Requests\LdapServers\FindLDAPServerGroupUserRequest;
use spkm\Jamf\Classic\Requests\LdapServers\FindLDAPServersByIdRequest;
use spkm\Jamf\Classic\Requests\LdapServers\FindLDAPServersByNameRequest;
use spkm\Jamf\Classic\Requests\LdapServers\FindLDAPServersRequest;
use spkm\Jamf\Classic\Requests\LdapServers\FindLDAPServerUserRequest;
use spkm\Jamf\Classic\Requests\LdapServers\UpdateLDAPServerByIdRequest;

/**
 * The ldapservers endpoints of the Classic API, from Jamf::classic()->ldapServers().
 */
class LdapServersResource extends ClassicResource
{
    public function __construct(ClassicConnector $connector)
    {
        parent::__construct($connector);
    }

    protected function listRequest(): ClassicRequest
    {
        return new FindLDAPServersRequest;
    }

    protected function itemRequest(int|string $id): ClassicRequest
    {
        return new FindLDAPServersByIdRequest($id);
    }

    protected function createRequest(array|string $record): ClassicRequest
    {
        return new CreateLDAPServerByIdRequest(0, $record);
    }

    protected function updateRequest(int|string $id, array|string $record): ClassicRequest
    {
        return new UpdateLDAPServerByIdRequest($id, $record);
    }

    protected function deleteRequest(int|string $id): ClassicRequest
    {
        return new DeleteLDAPServerByIdRequest($id);
    }

    /**
     * Creates a new ldap server by id: POST /ldapservers/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <ldap_server>), or the XML itself.
     */
    public function createLDAPServerById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new CreateLDAPServerByIdRequest($id, $record));
    }

    /**
     * Deletes a ldap server by id: DELETE /ldapservers/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function deleteLDAPServerById(int|string $id, array $options = []): bool
    {
        return $this->perform(new DeleteLDAPServerByIdRequest($id, $options));
    }

    /**
     * Display information for matching groups for an ldap server: GET /ldapservers/id/{id}/group/{group}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findLDAPServerGroup(int|string $id, string $group, array $options = []): mixed
    {
        return $this->fetch(new FindLDAPServerGroupRequest($id, $group, $options));
    }

    /**
     * Display information about user membership in a group for an ldap server: GET
     * /ldapservers/id/{id}/group/{group}/user/{user}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findLDAPServerGroupUser(int|string $id, string $group, string $user, array $options = []): mixed
    {
        return $this->fetch(new FindLDAPServerGroupUserRequest($id, $group, $user, $options));
    }

    /**
     * Display information for matching users for an ldap server: GET /ldapservers/id/{id}/user/{user}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findLDAPServerUser(int|string $id, string $user, array $options = []): mixed
    {
        return $this->fetch(new FindLDAPServerUserRequest($id, $user, $options));
    }

    /**
     * Finds all ldapservers: GET /ldapservers.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, array<string, mixed>>
     */
    public function findLDAPServers(array $options = []): Collection
    {
        return $this->fetch(new FindLDAPServersRequest($options));
    }

    /**
     * Finds ldap servers by id: GET /ldapservers/id/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findLDAPServersById(int|string $id, array $options = []): mixed
    {
        return $this->fetch(new FindLDAPServersByIdRequest($id, $options));
    }

    /**
     * Finds ldap servers by name: GET /ldapservers/name/{name}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function findLDAPServersByName(string $name, array $options = []): mixed
    {
        return $this->fetch(new FindLDAPServersByNameRequest($name, $options));
    }

    /**
     * Updates an existing ldap server by id: PUT /ldapservers/id/{id}.
     *
     * @param  array<string, mixed>|string  $record  The record as an array (written under <ldap_server>), or the XML itself.
     */
    public function updateLDAPServerById(int|string $id, array|string $record = []): mixed
    {
        return $this->fetch(new UpdateLDAPServerByIdRequest($id, $record));
    }
}
