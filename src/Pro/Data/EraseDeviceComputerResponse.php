<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A EraseDeviceComputerResponse record from the Jamf Pro API.
 */
readonly class EraseDeviceComputerResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Id of the computer for which eraseDevice command was queued */
        public ?string $deviceId = null,
        /** Uuid of the queued eraseDevice command */
        public ?string $commandUuid = null,
        public array $extra = [],
    ) {}
}
