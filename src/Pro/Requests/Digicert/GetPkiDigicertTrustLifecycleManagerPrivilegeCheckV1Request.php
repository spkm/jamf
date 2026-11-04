<?php

namespace spkm\Jamf\Pro\Requests\Digicert;

use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Check DigiCert account permissions for certificate deployment: GET /v1/pki/digicert/trust-lifecycle-manager/{id}/privilege-check.
 *
 * Checks that the DigiCert account associated with the given ID holds all permissions required to deploy certificates
 * via the Trust Lifecycle Manager. Returns 204 if all required permissions are present. Returns 403 with a list of
 * missing permission names if any are absent.
 */
class GetPkiDigicertTrustLifecycleManagerPrivilegeCheckV1Request extends GetRequest
{
    protected string $responseShape = self::NONE;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/digicert/trust-lifecycle-manager/'.Path::segment((string) $this->id).'/privilege-check';
    }
}
