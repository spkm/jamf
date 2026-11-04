<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerStorage record from the Jamf Pro API.
 */
readonly class ComputerStorage extends Data
{
    protected const LISTS = ['disks' => ComputerDisk::class];

    /**
     * @param  Collection<int, ComputerDisk>|null  $disks
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $bootDriveAvailableSpaceMegabytes = null,
        public ?Collection $disks = null,
        public array $extra = [],
    ) {}
}
