<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerContentCachingDataMigrationError record from the Jamf Pro API.
 */
readonly class ComputerContentCachingDataMigrationError extends Data
{
    protected const LISTS = ['userInfo' => ComputerContentCachingDataMigrationErrorUserInfo::class];

    /**
     * @param  Collection<int, ComputerContentCachingDataMigrationErrorUserInfo>|null  $userInfo
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?int $code = null,
        public ?string $domain = null,
        public ?Collection $userInfo = null,
        public array $extra = [],
    ) {}
}
