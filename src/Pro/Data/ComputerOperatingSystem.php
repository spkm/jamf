<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerOperatingSystem record from the Jamf Pro API.
 */
readonly class ComputerOperatingSystem extends Data
{
    protected const LISTS = ['extensionAttributes' => ComputerExtensionAttribute::class];

    /**
     * @param  Collection<int, ComputerExtensionAttribute>|null  $extensionAttributes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $version = null,
        public ?string $build = null,
        /** Collected for macOS 13.0 or later */
        public ?string $supplementalBuildVersion = null,
        /** Collected for macOS 13.0 or later */
        public ?string $rapidSecurityResponse = null,
        public ?string $activeDirectoryStatus = null,
        public ?string $fileVault2Status = null,
        public ?string $softwareUpdateDeviceId = null,
        public ?Collection $extensionAttributes = null,
        public array $extra = [],
    ) {}
}
