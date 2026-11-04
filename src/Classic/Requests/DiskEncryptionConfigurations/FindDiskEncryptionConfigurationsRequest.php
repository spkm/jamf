<?php

namespace spkm\Jamf\Classic\Requests\DiskEncryptionConfigurations;

use spkm\Jamf\Classic\Requests\ClassicGetRequest;

/**
 * Finds all disk encryption configurations: GET /diskencryptionconfigurations.
 */
class FindDiskEncryptionConfigurationsRequest extends ClassicGetRequest
{
    protected string $responseShape = self::LIST;

    /**
     * @param  array<string, mixed>  $options  Query options.
     */
    public function __construct(array $options = [])
    {
        $this->options = $options;
    }

    public function resolveEndpoint(): string
    {
        return '/diskencryptionconfigurations';
    }
}
