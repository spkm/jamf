<?php

namespace spkm\Jamf\Pro\Resources;

use spkm\Jamf\Data\Data;
use spkm\Jamf\Pro\Data\ClassicLdapMappings;
use spkm\Jamf\Pro\ProConnector;
use spkm\Jamf\Pro\Requests\ClassicLdap\GetClassicLdapV1Request;
use spkm\Jamf\Resources\BaseResource;

/**
 * The classic-ldap endpoints of the Jamf Pro API, from Jamf::classicLdap().
 *
 * @extends BaseResource<Data>
 */
class ClassicLdapResource extends BaseResource
{
    public function __construct(ProConnector $connector)
    {
        parent::__construct($connector, null);
    }

    /**
     * Get mappings for OnPrem Ldap configuration with given id: GET /v1/classic-ldap/{id}.
     *
     * @param  array<string, mixed>  $options  Query options.
     */
    public function getClassicLdapV1(int|string $id, array $options = []): ?ClassicLdapMappings
    {
        return $this->fetch(new GetClassicLdapV1Request($id, $options));
    }
}
