<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerApplicationV3 record from the Jamf Pro API.
 */
readonly class ComputerApplicationV3 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?string $path = null,
        public ?string $version = null,
        public ?string $cfBundleShortVersionString = null,
        public ?string $cfBundleVersion = null,
        public ?bool $macAppStore = null,
        public ?int $sizeMegabytes = null,
        public ?string $bundleId = null,
        public ?bool $updateAvailable = null,
        /** The app's external version ID. It can be used in the iTunes Search API to decide if the app needs to be updated */
        public ?string $externalVersionId = null,
        public array $extra = [],
    ) {}
}
