<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A FileTransferItem record from the Jamf Pro API.
 */
readonly class FileTransferItem extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $filePath = null,
        public ?CarbonImmutable $transferTimestamp = null,
        public ?string $fileTransferType = null,
        public array $extra = [],
    ) {}
}
