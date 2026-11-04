<?php

namespace spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview;

use spkm\Jamf\Pro\Data\SupervisionIdentity;
use spkm\Jamf\Requests\GetRequest;
use spkm\Jamf\Support\Path;

/**
 * Retrieve a Supervision Identity with the supplied id: GET /v1/supervision-identities/{id}.
 *
 * Retrieves a Supervision Identity with the supplied id
 */
class GetSupervisionIdentityV1Request extends GetRequest
{
    protected ?string $dto = SupervisionIdentity::class;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected int|string $id, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/v1/supervision-identities/'.Path::segment((string) $this->id);
    }
}
