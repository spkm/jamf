<?php

namespace spkm\Jamf\Pro\Requests\Digicert;

use spkm\Jamf\Pro\Data\DigicertConnectionStatus;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Get connection status of DigiCert Trust Lifecycle Manager for a given ID: GET /v1/pki/digicert/trust-lifecycle-manager/{id}/connection-status.
 */
class GetPkiDigicertTrustLifecycleManagerConnectionStatusV1Request extends GetRequest
{
    protected ?string $dto = DigicertConnectionStatus::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/digicert/trust-lifecycle-manager/'.Path::segment((string) $this->id).'/connection-status';
    }
}
