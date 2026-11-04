<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A ComputerContentCachingAlert record from the Jamf Pro API.
 */
readonly class ComputerContentCachingAlert extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $cacheBytesLimit = null,
        public ?string $className = null,
        public ?string $pathPreventingAccess = null,
        public ?CarbonImmutable $postDate = null,
        public ?int $reservedVolumeBytes = null,
        public ?string $resource = null,
        public array $extra = [],
    ) {}
}
