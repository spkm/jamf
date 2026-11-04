<?php

namespace spkm\Jamf\Pro\Requests\CloudLdap;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete Cloud Identity Provider configuration: DELETE /v2/cloud-ldaps/{id}.
 */
class DeleteCloudLdapV2Request extends DeleteRequest
{
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
