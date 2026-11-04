<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerAttachment record from the Jamf Pro API.
 */
readonly class ComputerAttachment extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $fileType = null,
        /** File size in bytes */
        public ?int $sizeBytes = null,
        public array $extra = [],
    ) {}
}
