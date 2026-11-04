<?php

namespace spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;
use spkm\Jamf\Support\Path;

/**
 * Finds disk encryption configurations by name: GET /diskencryptionconfigurations/name/{name}.
 *
 * You can PUT, POST, and DELETE using this resource URL.
 */
class FindDiskEncryptionConfigurationsByNameRequest extends ClassicGetRequest
{
    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(protected string $name, array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/diskencryptionconfigurations/name/'.Path::segment((string) $this->name);
    }
}
