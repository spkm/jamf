<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A JamfApplicationResponse record from the Jamf Pro API.
 */
readonly class JamfApplicationResponse extends Data
{
    protected const LISTS = ['artifacts' => JamfPackageResponse::class];

    /**
     * @param  Collection<int, JamfPackageResponse>|null  $artifacts
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $displayName = null,
        public ?string $releaseHistoryUrl = null,
        public ?Collection $artifacts = null,
        public array $extra = [],
    ) {}
}
