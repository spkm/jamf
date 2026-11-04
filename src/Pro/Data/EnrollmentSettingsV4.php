<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A EnrollmentSettingsV4 record from the Jamf Pro API.
 */
readonly class EnrollmentSettingsV4 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $installSingleProfile = null,
        public ?bool $signingMdmProfileEnabled = null,
        public ?CertificateIdentityV2 $mdmSigningCertificate = null,
        public ?bool $restrictReenrollment = null,
        public ?bool $flushLocationInformation = null,
        public ?bool $flushLocationHistoryInformation = null,
        public ?bool $flushPolicyHistory = null,
        public ?bool $flushExtensionAttributes = null,
        public ?bool $flushSoftwareUpdatePlans = null,
        public ?string $flushMdmCommandsOnReenroll = null,
        public ?bool $macOsEnterpriseEnrollmentEnabled = null,
        public ?string $managementUsername = null,
        public ?bool $createManagementAccount = null,
        public ?bool $hideManagementAccount = null,
        public ?bool $allowSshOnlyManagementAccount = null,
        public ?bool $ensureSshRunning = null,
        public ?bool $launchSelfService = null,
        public ?bool $signQuickAdd = null,
        public ?CertificateIdentityV2 $developerCertificateIdentity = null,
        public ?CertificateDetails $developerCertificateIdentityDetails = null,
        public ?CertificateDetails $mdmSigningCertificateDetails = null,
        public ?bool $iosEnterpriseEnrollmentEnabled = null,
        public ?bool $iosPersonalEnrollmentEnabled = null,
        /** **Deprecated as of 11.25.** This field always returns "USERENROLLMENT" in GET responses and ignores any input values in PUT requests. */
        public ?string $personalDeviceEnrollmentType = null,
        public ?bool $accountDrivenUserEnrollmentEnabled = null,
        public ?bool $accountDrivenDeviceIosEnrollmentEnabled = null,
        public ?bool $accountDrivenDeviceMacosEnrollmentEnabled = null,
        public ?bool $accountDrivenUserVisionosEnrollmentEnabled = null,
        public ?bool $accountDrivenDeviceVisionosEnrollmentEnabled = null,
        public ?bool $maidUsernameMergeEnabled = null,
        public array $extra = [],
    ) {}
}
