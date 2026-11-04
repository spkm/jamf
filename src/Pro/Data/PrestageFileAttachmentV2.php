<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PrestageFileAttachmentV2 record from the Jamf Pro API.
 */
readonly class PrestageFileAttachmentV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $fileType = null,
        public array $extra = [],
    ) {}
}
