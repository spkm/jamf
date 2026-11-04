<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerContentCaching record from the Jamf Pro API.
 */
readonly class ComputerContentCaching extends Data
{
    protected const LISTS = ['parents' => ComputerContentCachingParent::class, 'alerts' => ComputerContentCachingAlert::class, 'cacheDetails' => ComputerContentCachingCacheDetail::class];

    /**
     * @param  Collection<int, ComputerContentCachingParent>|null  $parents
     * @param  Collection<int, ComputerContentCachingAlert>|null  $alerts
     * @param  Collection<int, ComputerContentCachingCacheDetail>|null  $cacheDetails
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $computerContentCachingInformationId = null,
        public ?Collection $parents = null,
        public ?Collection $alerts = null,
        public ?bool $activated = null,
        public ?bool $active = null,
        public ?int $actualCacheBytesUsed = null,
        public ?Collection $cacheDetails = null,
        public ?int $cacheBytesFree = null,
        public ?int $cacheBytesLimit = null,
        public ?string $cacheStatus = null,
        public ?int $cacheBytesUsed = null,
        public ?bool $dataMigrationCompleted = null,
        public ?int $dataMigrationProgressPercentage = null,
        public ?ComputerContentCachingDataMigrationError $dataMigrationError = null,
        public ?int $maxCachePressureLast1HourPercentage = null,
        public ?int $personalCacheBytesFree = null,
        public ?int $personalCacheBytesLimit = null,
        public ?int $personalCacheBytesUsed = null,
        public ?int $port = null,
        public ?string $publicAddress = null,
        public ?string $registrationError = null,
        public ?int $registrationResponseCode = null,
        public ?CarbonImmutable $registrationStarted = null,
        public ?string $registrationStatus = null,
        public ?bool $restrictedMedia = null,
        public ?string $serverGuid = null,
        public ?string $startupStatus = null,
        public ?string $tetheratorStatus = null,
        public ?CarbonImmutable $totalBytesAreSince = null,
        public ?int $totalBytesDropped = null,
        public ?int $totalBytesImported = null,
        public ?int $totalBytesReturnedToChildren = null,
        public ?int $totalBytesReturnedToClients = null,
        public ?int $totalBytesReturnedToPeers = null,
        public ?int $totalBytesStoredFromOrigin = null,
        public ?int $totalBytesStoredFromParents = null,
        public ?int $totalBytesStoredFromPeers = null,
        public array $extra = [],
    ) {}
}
