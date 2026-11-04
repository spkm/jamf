<?php

namespace spkm\Jamf\Pro\Requests\Packages;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete the manifest for a specified package: DELETE /v1/packages/{id}/manifest.
 *
 * Delete the manifest file for a specified package
 */
class DeletePackageManifestV1Request extends DeleteRequest
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
        return '/v1/packages/'.Path::segment((string) $this->id).'/manifest';
    }
}
