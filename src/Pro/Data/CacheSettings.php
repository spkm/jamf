<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A CacheSettings record from the Jamf Pro API.
 */
readonly class CacheSettings extends Data
{
    protected const LISTS = ['memcachedEndpoints' => MemcachedEndpoints::class];

    /**
     * @param  Collection<int, MemcachedEndpoints>|null  $memcachedEndpoints
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $cacheType = null,
        public ?int $timeToLiveSeconds = null,
        public ?int $timeToIdleSeconds = null,
        public ?int $directoryTimeToLiveSeconds = null,
        public ?string $ehcacheMaxBytesLocalHeap = null,
        /** The default is for Jamf Pro to generate a UUID, so we can only give an example instead. */
        public ?string $cacheUniqueId = null,
        public ?bool $elasticache = null,
        public ?Collection $memcachedEndpoints = null,
        public array $extra = [],
    ) {}
}
