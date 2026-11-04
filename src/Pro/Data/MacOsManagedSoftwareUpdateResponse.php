<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A MacOsManagedSoftwareUpdateResponse record from the Jamf Pro API.
 */
readonly class MacOsManagedSoftwareUpdateResponse extends Data
{
    protected const LISTS = ['errors' => ApiErrorCause::class];

    /**
     * @param  list<string>|null  $processManagerUuids
     * @param  Collection<int, ApiErrorCause>|null  $errors
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $processManagerUuids = null,
        public ?Collection $errors = null,
        public array $extra = [],
    ) {}
}
