<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Session status
 */
readonly class SessionStatus extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        /** Session state */
        public ?string $sessionState = null,
        /** Defines if the end user is online */
        public ?bool $online = null,
        public array $extra = [],
    ) {}
}
