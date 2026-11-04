<?php

namespace spkm\Jamf\Pro\Requests\Ldap;

use spkm\Jamf\Pro\Data\LdapServer;
use spkm\Jamf\Requests\GetRequest;

/**
 * Retrieve all Servers including LDAP and Cloud Identity Providers: GET /ldap/servers.
 */
class GetLdapServersRequest extends GetRequest
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
        return '/ldap/servers';
    }
}
