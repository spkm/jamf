<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerPartitionEncryption record from the Jamf Pro API.
 */
readonly class ComputerPartitionEncryption extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $partitionName = null,
        public ?string $partitionFileVault2State = null,
        public ?int $partitionFileVault2Percent = null,
        public array $extra = [],
    ) {}
}
