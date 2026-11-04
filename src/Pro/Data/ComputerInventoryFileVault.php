<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerInventoryFileVault record from the Jamf Pro API.
 */
readonly class ComputerInventoryFileVault extends Data
{
    protected const HIDDEN = ['personalRecoveryKey', 'individualRecoveryKeyValidityStatus'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $computerId = null,
        public ?string $name = null,
        public ?string $personalRecoveryKey = null,
        public ?ComputerPartitionEncryption $bootPartitionEncryptionDetails = null,
        public ?string $individualRecoveryKeyValidityStatus = null,
        public ?bool $institutionalRecoveryKeyPresent = null,
        public ?string $diskEncryptionConfigurationName = null,
        public array $extra = [],
    ) {}
}
