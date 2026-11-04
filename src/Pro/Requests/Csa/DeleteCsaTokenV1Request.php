<?php

namespace spkm\Jamf\Pro\Requests\Csa;

use spkm\Jamf\Requests\DeleteRequest;

/**
 * Delete the CSA token exchange - This will disable Jamf Pro's ability to authenticate with cloud-hosted services: DELETE /v1/csa/token.
 */
class DeleteCsaTokenV1Request extends DeleteRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/csa/token';
    }
}
