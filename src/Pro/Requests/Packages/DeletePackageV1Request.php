<?php

namespace spkm\Jamf\Pro\Requests\Packages;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Remove specified package: DELETE /v1/packages/{id}.
 *
 * Removes specified package
 */
class DeletePackageV1Request extends DeleteRequest
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
        return '/v1/packages/'.Path::segment((string) $this->id);
    }
}
