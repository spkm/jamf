<?php

namespace spkm\Jamf\Pro\Resources;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\LdapGroup;
use spkm\Jamf\Pro\Data\LdapServer;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\Ldap\GetLdapGroupsRequest;
use spkm\Jamf\Pro\Requests\Ldap\GetLdapGroupsV1Request;
use spkm\Jamf\Pro\Requests\Ldap\GetLdapLdapServersV1Request;
use spkm\Jamf\Pro\Requests\Ldap\GetLdapServersRequest;
use spkm\Jamf\Pro\Requests\Ldap\GetLdapServersV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The ldap endpoints of the Jamf Pro API, from Jamf::ldap().
 *
 * @extends BaseResource<Data>
 */
class LdapResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Retrieve the configured access groups that contain the text in the search param: GET /ldap/groups.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: q.
     * @return Collection<int, LdapGroup>
     */
    public function getLdapGroups(array $options = []): Collection
    {
        return $this->fetch(new GetLdapGroupsRequest($options));
    }

    /**
     * Retrieve the configured access groups that contain the text in the search param: GET /v1/ldap/groups.
     *
     * @param  array<string, mixed>  $options  Query options Jamf documents: q.
     * @return Collection<int, LdapGroup>
     */
    public function getLdapGroupsV1(array $options = []): Collection
    {
        return $this->fetch(new GetLdapGroupsV1Request($options));
    }

    /**
     * Retrieve all LDAP Servers: GET /v1/ldap/ldap-servers.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LdapServer>
     */
    public function getLdapLdapServersV1(array $options = []): Collection
    {
        return $this->fetch(new GetLdapLdapServersV1Request($options));
    }

    /**
     * Retrieve all Servers including LDAP and Cloud Identity Providers: GET /ldap/servers.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LdapServer>
     */
    public function getLdapServers(array $options = []): Collection
    {
        return $this->fetch(new GetLdapServersRequest($options));
    }

    /**
     * Retrieve all Servers including LDAP and Cloud Identity Providers: GET /v1/ldap/servers.
     *
     * @param  array<string, mixed>  $options  Query options.
     * @return Collection<int, LdapServer>
     */
    public function getLdapServersV1(array $options = []): Collection
    {
        return $this->fetch(new GetLdapServersV1Request($options));
    }
}
