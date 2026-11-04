<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A GetComputerPrestageV3 record from the Jamf Pro API.
 */
readonly class GetComputerPrestageV3 extends Data
{
    protected const HIDDEN = ['recoveryLockPasswordType'];

    /**
     * @param  array<string, mixed>|null  $skipSetupItems
     * @param  list<string>|null  $anchorCertificates
     * @param  list<string>|null  $prestageInstalledProfileIds
     * @param  list<string>|null  $customPackageIds
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
        public ?LocationInformationV2 $locationInformation = null,
        public ?PrestagePurchasingInformationV2 $purchasingInformation = null,
        /** The Base64 encoded PEM Certificate */
        public ?array $anchorCertificates = null,
        public ?string $enrollmentCustomizationId = null,
        public ?string $language = null,
        public ?string $region = null,
        public ?bool $autoAdvanceSetup = null,
        public ?bool $installProfilesDuringSetup = null,
        public ?array $prestageInstalledProfileIds = null,
        public ?array $customPackageIds = null,
        public ?string $customPackageDistributionPointId = null,
        public ?bool $enableRecoveryLock = null,
        public ?string $recoveryLockPasswordType = null,
        public ?bool $rotateRecoveryLockPassword = null,
        public ?string $prestageMinimumOsTargetVersionType = null,
        public ?string $minimumOsSpecificVersion = null,
        /** Indicates whether Platform SSO (PSSO) is enabled for this computer prestage, regardless of Device first or Identity first workflows. When enabled, the PSSO application will be deployed to devices... */
        public ?bool $pssoEnabled = null,
        /** The bundle identifier for the Platform SSO (PSSO) application Device first workflow. This identifier is used to specify which PSSO app should be deployed to devices during the setup process. */
        public ?string $platformSsoAppBundleId = null,
        /** The URL to the configuration profile for the Platform SSO (PSSO) application Identity first workflow. This URL is used when deploying the PSSO app to devices during the setup process. Users should... */
        public ?string $profileUrl = null,
        /** The identifier for the configuration profile associated with the Platform SSO (PSSO) application Identity first workflow. This ID is used to specify which configuration profile should be applied to... */
        public ?string $pssoConfigProfileId = null,
        /** The URL to the manifest file for the Platform SSO (PSSO) application Identity first workflow. This URL is used when deploying the PSSO app to devices during the setup process. */
        public ?string $manifestUrl = null,
        public ?string $id = null,
        public ?string $profileUuid = null,
        public ?string $siteId = null,
        public ?int $versionLock = null,
        public ?AccountSettingsResponse $accountSettings = null,
        public array $extra = [],
    ) {}
}
