<?php

namespace spkm\Jamf\Pro\Requests\Digicert;

use spkm\Jamf\Pro\Data\DigiCertSettingResponse;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve DigiCert Trust Lifecycle Manager configuration: GET /v1/pki/digicert/trust-lifecycle-manager/{id}.
 *
 * Retrieve the current configuration of the DigiCert Trust Lifecycle Manager.
 */
class GetPkiDigicertTrustLifecycleManagerV1Request extends GetRequest
{
    protected ?string $dto = DigiCertSettingResponse::class;

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
