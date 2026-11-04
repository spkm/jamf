<?php

namespace spkm\Jamf\Pro\Requests\CloudLdap;

use spkm\Jamf\Pro\Data\LdapConfigurationResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get Cloud Identity Provider configuration with given id: GET /v2/cloud-ldaps/{id}.
 */
class GetCloudLdapV2Request extends GetRequest
{
    protected ?string $dto = LdapConfigurationResponse::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v2/cloud-ldaps/'.Path::segment((string) $this->id);
    }
}
