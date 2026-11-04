<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerOverview record from the Jamf Pro API.
 */
readonly class ComputerOverview extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?ComputerLocation $location = null,
        public ?string $name = null,
        public ?string $udid = null,
        public ?string $serialNumber = null,
        public ?string $lastContactDate = null,
        public ?string $lastReportDate = null,
        public ?string $lastEnrolledDate = null,
        public ?string $operatingSystemVersion = null,
        public ?string $operatingSystemBuild = null,
        /** Collected for macOS 13.0 or later */
        public ?string $operatingSystemSupplementalBuildVersion = null,
        /** Collected for macOS 13.0 or later */
        public ?string $operatingSystemRapidSecurityResponse = null,
        public ?string $ipAddress = null,
        public ?string $macAddress = null,
        public ?string $assetTag = null,
        public ?string $modelIdentifier = null,
        public ?int $mdmAccessRights = null,
        public ?bool $isManaged = null,
        public ?string $managementId = null,
        public array $extra = [],
    ) {}
}
