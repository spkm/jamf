<?php

namespace spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations;

use spkm\Jamf\Classic\Requests\ClassicDeleteRequest;
use spkm\Jamf\Support\Path;

/**
 * Deletes a disk encryption configuration by id: DELETE /diskencryptionconfigurations/id/{id}.
 */
class DeleteDiskEncryptionConfigurationByIdRequest extends ClassicDeleteRequest
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
        return '/diskencryptionconfigurations/id/'.Path::segment((string) $this->id);
    }
}
