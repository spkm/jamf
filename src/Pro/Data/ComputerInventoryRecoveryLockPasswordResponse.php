<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerInventoryRecoveryLockPasswordResponse record from the Jamf Pro API.
 */
readonly class ComputerInventoryRecoveryLockPasswordResponse extends Data
{
    protected const HIDDEN = ['recoveryLockPassword'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $recoveryLockPassword = null,
        public array $extra = [],
    ) {}
}
