<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MdmCommandError record from the Jamf Pro API.
 */
readonly class MdmCommandError extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $errorCode = null,
        public ?string $errorDomain = null,
        public ?string $errorLocalizedDescription = null,
        public ?string $errorEnglishDescription = null,
        public array $extra = [],
    ) {}
}
