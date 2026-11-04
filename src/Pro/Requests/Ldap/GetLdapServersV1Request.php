<?php

namespace spkm\Jamf\Pro\Requests\Ldap;

use spkm\Jamf\Pro\Data\LdapServer;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve all Servers including LDAP and Cloud Identity Providers: GET /v1/ldap/servers.
 *
 * Retrieve all active Servers including LDAP and Cloud Identity Providers.
 */
class GetLdapServersV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = LdapServer::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/ldap/servers';
    }
}
