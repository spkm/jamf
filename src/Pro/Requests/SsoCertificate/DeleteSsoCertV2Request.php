<?php

namespace spkm\Jamf\Pro\Requests\SsoCertificate;

use spkm\Jamf\Requests\DeleteRequest;

/**
 * Delete the currently configured certificate used by SSO: DELETE /v2/sso/cert.
 *
 * Deletes the currently configured certificate used by SSO.
 */
class DeleteSsoCertV2Request extends DeleteRequest
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
        return '/v2/sso/cert';
    }
}
