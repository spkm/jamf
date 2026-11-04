<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerInventoryDeviceLockPinResponse record from the Jamf Pro API.
 */
readonly class ComputerInventoryDeviceLockPinResponse extends Data
{
    protected const HIDDEN = ['pin'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $pin = null,
        public array $extra = [],
    ) {}
}
