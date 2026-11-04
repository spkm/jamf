<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AccountSettingsResponse record from the Jamf Pro API.
 */
readonly class AccountSettingsResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** id of Account Settings */
        public ?string $id = null,
        public ?bool $payloadConfigured = null,
        public ?bool $localAdminAccountEnabled = null,
        public ?string $adminUsername = null,
        public ?bool $hiddenAdminAccount = null,
        public ?bool $localUserManaged = null,
        public ?string $userAccountType = null,
        public ?int $versionLock = null,
        public ?bool $prefillPrimaryAccountInfoFeatureEnabled = null,
        /** Values accepted are only CUSTOM and DEVICE_OWNER */
        public ?string $prefillType = null,
        public ?string $prefillAccountFullName = null,
        public ?string $prefillAccountUserName = null,
        public ?bool $preventPrefillInfoFromModification = null,
        public array $extra = [],
    ) {}
}
