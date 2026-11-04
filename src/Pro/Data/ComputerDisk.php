<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerDisk record from the Jamf Pro API.
 */
readonly class ComputerDisk extends Data
{
    protected const LISTS = ['partitions' => ComputerPartition::class];

    /**
     * @param  Collection<int, ComputerPartition>|null  $partitions
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $device = null,
        public ?string $model = null,
        public ?string $revision = null,
        public ?string $serialNumber = null,
        /** Disk Size in MB. */
        public ?int $sizeMegabytes = null,
        /** S.M.A.R.T Status */
        public ?string $smartStatus = null,
        /** Connection type attribute. */
        public ?string $type = null,
        public ?Collection $partitions = null,
        public array $extra = [],
    ) {}
}
