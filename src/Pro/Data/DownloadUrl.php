<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * The URL to download a file from.
 */
readonly class DownloadUrl extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $uri = null,
        public array $extra = [],
    ) {}
}
