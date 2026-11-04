<?php

namespace spkm\Jamf\Pro\Requests\PatchSoftwareTitleConfigurations;

use spkm\Jamf\Requests\DeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Delete Patch Software Title Configurations with the supplied id: DELETE /v3/patch-software-title-configurations/{id}.
 *
 * Deletes Patch Software Title Configurations with the supplied id
 */
class DeletePatchSoftwareTitleConfigurationV3Request extends DeleteRequest
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
        return '/v3/patch-software-title-configurations/'.Path::segment((string) $this->id);
    }
}
