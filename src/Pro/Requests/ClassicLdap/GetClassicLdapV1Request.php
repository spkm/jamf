<?php

namespace spkm\Jamf\Pro\Requests\ClassicLdap;

use spkm\Jamf\Pro\Data\ClassicLdapMappings;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get mappings for OnPrem Ldap configuration with given id: GET /v1/classic-ldap/{id}.
 */
class GetClassicLdapV1Request extends GetRequest
{
    protected ?string $dto = ClassicLdapMappings::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/classic-ldap/'.Path::segment((string) $this->id);
    }
}
