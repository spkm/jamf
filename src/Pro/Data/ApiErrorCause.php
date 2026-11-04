<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ApiErrorCause record from the Jamf Pro API.
 */
readonly class ApiErrorCause extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Error-specific code that can be used to identify localization string, etc. */
        public ?string $code = null,
        /** Name of the field that caused the error. */
        public ?string $field = null,
        /** A general description of error for troubleshooting/debugging. Generally this text should not be displayed to a user; instead refer to errorCode and it's localized text */
        public ?string $description = null,
        /** id of object with error. Optional. */
        public ?string $id = null,
        public array $extra = [],
    ) {}
}
