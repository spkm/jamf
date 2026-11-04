<?php

namespace spkm\Jamf\Pro\Requests\Digicert;

use spkm\Jamf\Pro\Data\DigicertDependency;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve list of DigiCert Trust Lifecycle Manager Settings dependencies: GET /v1/pki/digicert/trust-lifecycle-manager/{id}/dependencies.
 */
class GetPkiDigicertTrustLifecycleManagerDependenciesV1Request extends GetRequest
{
    protected string $responseShape = self::LIST;

    protected ?string $dto = DigicertDependency::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/pki/digicert/trust-lifecycle-manager/'.Path::segment((string) $this->id).'/dependencies';
    }
}
