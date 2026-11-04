<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerDiskEncryption record from the Jamf Pro API.
 */
readonly class ComputerDiskEncryption extends Data
{
    /**
     * @param  list<string>|null  $fileVault2EnabledUserNames
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?ComputerPartitionEncryption $bootPartitionEncryptionDetails = null,
        public ?string $individualRecoveryKeyValidityStatus = null,
        public ?bool $institutionalRecoveryKeyPresent = null,
        public ?string $diskEncryptionConfigurationName = null,
        public ?bool $fileVault2Enabled = null,
        public ?array $fileVault2EnabledUserNames = null,
        public ?string $fileVault2EligibilityMessage = null,
        public array $extra = [],
    ) {}
}
