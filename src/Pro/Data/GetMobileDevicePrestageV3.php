<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A GetMobileDevicePrestageV3 record from the Jamf Pro API.
 */
readonly class GetMobileDevicePrestageV3 extends Data
{
    /**
     * @param  array<string, mixed>|null  $skipSetupItems
     * @param  list<string>|null  $anchorCertificates
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $displayName = null,
        public ?bool $mandatory = null,
        public ?bool $mdmRemovable = null,
        public ?string $supportPhoneNumber = null,
        public ?string $supportEmailAddress = null,
        public ?string $department = null,
        public ?bool $defaultPrestage = null,
        public ?string $enrollmentSiteId = null,
        public ?bool $keepExistingSiteMembership = null,
        public ?bool $keepExistingLocationInformation = null,
        public ?bool $requireAuthentication = null,
        public ?string $authenticationPrompt = null,
        public ?bool $preventActivationLock = null,
        public ?bool $enableDeviceBasedActivationLock = null,
        public ?string $deviceEnrollmentProgramInstanceId = null,
        public ?array $skipSetupItems = null,
        public ?LocationInformationV3 $locationInformation = null,
        public ?PrestagePurchasingInformationV3 $purchasingInformation = null,
        /** The Base64 encoded PEM Certificate */
        public ?array $anchorCertificates = null,
        public ?string $enrollmentCustomizationId = null,
        public ?string $language = null,
        public ?string $region = null,
        public ?bool $autoAdvanceSetup = null,
        public ?bool $allowPairing = null,
        public ?bool $multiUser = null,
        public ?bool $supervised = null,
        public ?int $maximumSharedAccounts = null,
        public ?bool $configureDeviceBeforeSetupAssistant = null,
        public ?MobileDevicePrestageNamesV3 $names = null,
        public ?bool $sendTimezone = null,
        public ?string $timezone = null,
        public ?int $storageQuotaSizeMegabytes = null,
        public ?bool $useStorageQuotaSize = null,
        public ?bool $temporarySessionOnly = null,
        public ?bool $enforceTemporarySessionTimeout = null,
        public ?int $temporarySessionTimeout = null,
        public ?bool $enforceUserSessionTimeout = null,
        public ?int $userSessionTimeout = null,
        public ?string $prestageMinimumOsTargetVersionTypeIos = null,
        public ?string $minimumOsSpecificVersionIos = null,
        public ?string $prestageMinimumOsTargetVersionTypeIpad = null,
        public ?string $minimumOsSpecificVersionIpad = null,
        public ?bool $rtsEnabled = null,
        public ?string $rtsConfigProfileId = null,
        /** Controls whether managed apps are preserved during Return to Service operations. */
        public ?bool $preserveManagedApps = null,
        /** Controls whether apps are installed during the enrollment process. */
        public ?bool $installAppsDuringEnrollment = null,
        /** If true, the device does not use the profile when it restores a backup. Default is false. Available in iOS 26 and later, and visionOS 26 and later; otherwise ignored by devices. */
        public ?bool $doNotUseProfileFromBackup = null,
        public ?string $id = null,
        public ?string $profileUuid = null,
        public ?string $siteId = null,
        public ?int $versionLock = null,
        public array $extra = [],
    ) {}
}
