<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AccountPreferencesV6 record from the Jamf Pro API.
 */
readonly class AccountPreferencesV6 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Language codes supported by Jamf Pro */
        public ?string $language = null,
        public ?string $dateFormat = null,
        public ?string $timezone = null,
        public ?int $resultsPerPage = null,
        public ?string $userInterfaceDisplayTheme = null,
        public ?bool $disableRelativeDates = null,
        public ?bool $disablePageLeaveCheck = null,
        public ?bool $disableTablePagination = null,
        public ?bool $showDirectoryGroupUuidColumn = null,
        public ?bool $disableShortcutsTooltips = null,
        public ?string $configProfilesSortingMethod = null,
        public ?string $computerSearchMethod = null,
        public ?string $computerApplicationSearchMethod = null,
        public ?string $computerApplicationUsageSearchMethod = null,
        public ?string $computerSoftwareUpdateSearchMethod = null,
        public ?string $computerLocalUserAccountSearchMethod = null,
        public ?string $computerPackageReceiptSearchMethod = null,
        public ?string $computerPrinterSearchMethod = null,
        public ?string $computerPeripheralSearchMethod = null,
        public ?string $computerServiceSearchMethod = null,
        public ?string $mobileDeviceSearchMethod = null,
        public ?string $mobileDeviceAppSearchMethod = null,
        public ?string $userSearchMethod = null,
        public ?string $userAllContentSearchMethod = null,
        public ?string $userMobileDeviceAppSearchMethod = null,
        public ?string $userMacAppStoreAppSearchMethod = null,
        public ?string $userEbookSearchMethod = null,
        public array $extra = [],
    ) {}
}
