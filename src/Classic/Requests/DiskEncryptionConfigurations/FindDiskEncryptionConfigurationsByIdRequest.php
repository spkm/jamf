<?php

namespace spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds disk encryption configurations by id: GET /diskencryptionconfigurations/id/{id}.
 */
class FindDiskEncryptionConfigurationsByIdRequest extends ClassicGetRequest
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
