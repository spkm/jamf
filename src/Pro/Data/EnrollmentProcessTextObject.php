<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A EnrollmentProcessTextObject record from the Jamf Pro API.
 */
readonly class EnrollmentProcessTextObject extends Data
{
    protected const HIDDEN = ['password'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $languageCode = null,
        public ?string $name = null,
        public ?string $title = null,
        public ?string $loginDescription = null,
        public ?string $username = null,
        public ?string $password = null,
        public ?string $loginButton = null,
        public ?string $deviceClassDescription = null,
        public ?string $deviceClassPersonal = null,
        public ?string $deviceClassPersonalDescription = null,
        public ?string $deviceClassEnterprise = null,
        public ?string $deviceClassEnterpriseDescription = null,
        public ?string $deviceClassButton = null,
        public ?string $personalEula = null,
        public ?string $enterpriseEula = null,
        public ?string $eulaButton = null,
        public ?string $siteDescription = null,
        public ?string $certificateText = null,
        public ?string $certificateButton = null,
        public ?string $certificateProfileName = null,
        public ?string $certificateProfileDescription = null,
        /** **Deprecated as of 11.25.** This field always returns empty string in GET responses and ignores any input values in PUT requests. */
        public ?string $personalText = null,
        /** **Deprecated as of 11.25.** This field always returns empty string in GET responses and ignores any input values in PUT requests. */
        public ?string $personalButton = null,
        /** **Deprecated as of 11.25.** This field always returns empty string in GET responses and ignores any input values in PUT requests. */
        public ?string $personalProfileName = null,
        /** **Deprecated as of 11.25.** This field always returns empty string in GET responses and ignores any input values in PUT requests. */
        public ?string $personalProfileDescription = null,
        public ?string $userEnrollmentText = null,
        public ?string $userEnrollmentButton = null,
        public ?string $userEnrollmentProfileName = null,
        public ?string $userEnrollmentProfileDescription = null,
        public ?string $enterpriseText = null,
        public ?string $enterpriseButton = null,
        public ?string $enterpriseProfileName = null,
        public ?string $enterpriseProfileDescription = null,
        public ?string $enterprisePending = null,
        public ?string $quickAddText = null,
        public ?string $quickAddButton = null,
        public ?string $quickAddName = null,
        public ?string $quickAddPending = null,
        public ?string $completeMessage = null,
        public ?string $failedMessage = null,
        public ?string $tryAgainButton = null,
        public ?string $checkNowButton = null,
        public ?string $checkEnrollmentMessage = null,
        public ?string $logoutButton = null,
        public array $extra = [],
    ) {}
}
