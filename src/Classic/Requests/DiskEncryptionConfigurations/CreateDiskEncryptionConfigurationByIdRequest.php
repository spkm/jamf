<?php

namespace spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations;

use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Creates a new disk encryption configuration by id: POST /diskencryptionconfigurations/id/{id}.
 */
class CreateDiskEncryptionConfigurationByIdRequest extends ClassicWriteRequest
{
    protected string $root = 'disk_encryption_configuration';

    /**
     * @param  array<string, mixed>|string  $record  The record as an array of Jamf's field names (written as XML under <disk_encryption_configuration>), or the XML itself.
     */
    public function __construct(protected int|string $id, array|string $record = [])
    {
        $this->record = $record;
    }

    public function resolveEndpoint(): string
    {
        return '/diskencryptionconfigurations/id/'.Path::segment((string) $this->id);
    }
}
