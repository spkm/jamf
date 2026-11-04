<?php

namespace spkm\Jamf\Pro\Requests\JamfProtect;

use spkm\Jamf\Requests\DeleteRequest;

/**
 * Delete Jamf Protect API registration: DELETE /v1/jamf-protect.
 *
 * Deletes an existing Jamf Protect API registration if present. Jamf Protect API integration will be disabled.
 */
class DeleteJamfProtectV1Request extends DeleteRequest
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
        return '/v1/jamf-protect';
    }
}
