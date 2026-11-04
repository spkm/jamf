<?php

namespace spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations;

use Saloon\Enums\Method;
use spkm\Jamf\Classic\Requests\ClassicWriteRequest;
use spkm\Jamf\Support\Path;

/**
 * Updates an existing disk encryption configuration by id: PUT /diskencryptionconfigurations/id/{id}.
 */
class UpdateDiskEncryptionConfigurationByIdRequest extends ClassicWriteRequest
{
    protected Method $method = Method::PUT;

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
