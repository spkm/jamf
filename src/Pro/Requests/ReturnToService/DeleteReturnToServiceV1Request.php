<?php

namespace spkm\Jamf\Pro\Requests\ReturnToService;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete a Return To Service Configuration with the supplied id: DELETE /v1/return-to-service/{id}.
 *
 * Deletes a Return To Service Configuration with the supplied id
 */
class DeleteReturnToServiceV1Request extends DeleteRequest
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
        return '/v1/return-to-service/'.Path::segment((string) $this->id);
    }
}
