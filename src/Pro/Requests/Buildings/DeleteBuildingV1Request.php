<?php

namespace spkm\Jamf\Pro\Requests\Buildings;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified Building record: DELETE /v1/buildings/{id}.
 *
 * Removes specified building record
 */
class DeleteBuildingV1Request extends DeleteRequest
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
        return '/v1/buildings/'.Path::segment((string) $this->id);
    }
}
