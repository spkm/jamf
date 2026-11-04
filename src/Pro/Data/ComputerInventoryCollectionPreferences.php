<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerInventoryCollectionPreferences record from the Jamf Pro API.
 */
readonly class ComputerInventoryCollectionPreferences extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $monitorApplicationUsage = null,
        public ?bool $includeFonts = null,
        public ?bool $includePlugins = null,
        public ?bool $includePackages = null,
        public ?bool $includeSoftwareUpdates = null,
        public ?bool $includeSoftwareId = null,
        public ?bool $includeAccounts = null,
        public ?bool $calculateSizes = null,
        public ?bool $includeHiddenAccounts = null,
        public ?bool $includePrinters = null,
        public ?bool $includeServices = null,
        public ?bool $collectSyncedMobileDeviceInfo = null,
        public ?bool $updateLdapInfoOnComputerInventorySubmissions = null,
        public ?bool $monitorBeacons = null,
        public ?bool $allowChangingUserAndLocation = null,
        public ?bool $useUnixUserPaths = null,
        public ?bool $collectUnmanagedCertificates = null,
        public array $extra = [],
    ) {}
}
