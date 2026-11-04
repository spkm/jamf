<?php

namespace spkm\Jamf\Pro\Requests\Digicert;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete DigiCert Trust Lifecycle Manager configuration: DELETE /v1/pki/digicert/trust-lifecycle-manager/{id}.
 *
 * Delete the current configuration of the DigiCert Trust Lifecycle Manager.
 */
class DeletePkiDigicertTrustLifecycleManagerV1Request extends DeleteRequest
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
        return '/v1/pki/digicert/trust-lifecycle-manager/'.Path::segment((string) $this->id);
    }
}
