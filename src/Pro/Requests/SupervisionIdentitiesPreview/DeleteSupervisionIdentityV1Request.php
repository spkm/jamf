<?php

namespace spkm\Jamf\Pro\Requests\SupervisionIdentitiesPreview;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a Supervision Identity with the supplied id: DELETE /v1/supervision-identities/{id}.
 *
 * Deletes a Supervision Identity with the supplied id
 */
class DeleteSupervisionIdentityV1Request extends DeleteRequest
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
        return '/v1/supervision-identities/'.Path::segment((string) $this->id);
    }
}
