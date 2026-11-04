<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Remote administration response
 */
readonly class RemoteAdministrationResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $siteId = null,
        public ?string $displayName = null,
        public ?string $type = null,
        public array $extra = [],
    ) {}
}
