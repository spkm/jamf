<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerSecurity record from the Jamf Pro API.
 */
readonly class ComputerSecurity extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $sipStatus = null,
        public ?string $gatekeeperStatus = null,
        public ?string $xprotectVersion = null,
        public ?bool $autoLoginDisabled = null,
        /** Collected for macOS 10.14.4 or later */
        public ?bool $remoteDesktopEnabled = null,
        /** Collected for macOS 10.15.0 or later */
        public ?bool $activationLockEnabled = null,
        public ?bool $recoveryLockEnabled = null,
        public ?bool $firewallEnabled = null,
        /** Collected for macOS 10.15.0 or later */
        public ?string $secureBootLevel = null,
        /** Collected for macOS 10.15.0 or later */
        public ?string $externalBootLevel = null,
        /** Collected for macOS 11 or later */
        public ?bool $bootstrapTokenAllowed = null,
        /** Collected for macOS 11 or later */
        public ?string $bootstrapTokenEscrowedStatus = null,
        public ?string $lastAttestationAttempt = null,
        public ?string $lastSuccessfulAttestation = null,
        public ?string $attestationStatus = null,
        /** Whether Lockdown Mode is enabled. */
        public ?bool $lockdownModeEnabled = null,
        public array $extra = [],
    ) {}
}
