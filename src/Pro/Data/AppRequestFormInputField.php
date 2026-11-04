<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AppRequestFormInputField record from the Jamf Pro API.
 */
readonly class AppRequestFormInputField extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $id = null,
        public ?string $title = null,
        public ?string $description = null,
        /** Highest priority is 1, lowest is 255 */
        public ?int $priority = null,
        public array $extra = [],
    ) {}
}
