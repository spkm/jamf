<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Response object.
 */
readonly class UserPreferencesSettings extends Data
{
    /**
     * @param  list<string>|null  $values
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $username = null,
        public ?string $key = null,
        /** List of preferences for the specific key and user. */
        public ?array $values = null,
        public array $extra = [],
    ) {}
}
