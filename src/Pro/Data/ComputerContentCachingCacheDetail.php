<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerContentCachingCacheDetail record from the Jamf Pro API.
 */
readonly class ComputerContentCachingCacheDetail extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $computerContentCachingCacheDetailsId = null,
        public ?string $categoryName = null,
        public ?int $diskSpaceBytesUsed = null,
        public array $extra = [],
    ) {}
}
