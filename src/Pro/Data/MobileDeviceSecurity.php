<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * This section only available for Ios type.
 */
readonly class MobileDeviceSecurity extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $dataProtected = null,
        public ?bool $blockLevelEncryptionCapable = null,
        public ?bool $fileLevelEncryptionCapable = null,
        public ?bool $passcodePresent = null,
        public ?bool $passcodeCompliant = null,
        public ?bool $passcodeCompliantWithProfile = null,
        public ?int $hardwareEncryption = null,
        public ?bool $activationLockEnabled = null,
        public ?bool $jailBreakDetected = null,
        public ?string $attestationStatus = null,
        public ?CarbonImmutable $lastAttestationAttemptDate = null,
        public ?CarbonImmutable $lastSuccessfulAttestationDate = null,
        public ?int $passcodeLockGracePeriodEnforcedSeconds = null,
        /** **Deprecated as of 11.25.** This field always returns false */
        public ?bool $personalDeviceProfileCurrent = null,
        public ?bool $lostModeEnabled = null,
        public ?bool $lostModePersistent = null,
        public ?string $lostModeMessage = null,
        public ?string $lostModePhoneNumber = null,
        public ?string $lostModeFootnote = null,
        public ?MobileDeviceLostModeLocation $lostModeLocation = null,
        /** Indicates the bootstrap token escrow status for the device */
        public ?string $bootstrapTokenEscrowed = null,
        /** Whether Lockdown Mode is enabled. */
        public ?bool $lockdownModeEnabled = null,
        public array $extra = [],
    ) {}
}
