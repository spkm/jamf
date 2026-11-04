<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A ComputerContentCachingParentAlert record from the Jamf Pro API.
 */
readonly class ComputerContentCachingParentAlert extends Data
{
    /**
     * @param  list<string>|null  $addresses
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $contentCachingParentAlertId = null,
        public ?array $addresses = null,
        public ?string $className = null,
        public ?CarbonImmutable $postDate = null,
        public array $extra = [],
    ) {}
}
