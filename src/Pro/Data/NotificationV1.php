<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * Jamf Pro notification used for important alerts.
 */
readonly class NotificationV1 extends Data
{
    /**
     * @param  array<string, mixed>|null  $params
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $type = null,
        public ?string $id = null,
        public ?array $params = null,
        public array $extra = [],
    ) {}
}
