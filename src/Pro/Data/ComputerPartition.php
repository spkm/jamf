<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerPartition record from the Jamf Pro API.
 */
readonly class ComputerPartition extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        /** Partition Size in MB. */
        public ?int $sizeMegabytes = null,
        /** Available space in MB. */
        public ?int $availableMegabytes = null,
        public ?string $partitionType = null,
        /** Percentage of space used. */
        public ?int $percentUsed = null,
        public ?string $fileVault2State = null,
        /** Percentage progress of current FileVault 2 operation. */
        public ?int $fileVault2ProgressPercent = null,
        public ?bool $lvmManaged = null,
        public array $extra = [],
    ) {}
}
