<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerContentCachingParentDetails record from the Jamf Pro API.
 */
readonly class ComputerContentCachingParentDetails extends Data
{
    protected const LISTS = ['localNetwork' => ComputerContentCachingParentLocalNetwork::class];

    /**
     * @param  Collection<int, ComputerContentCachingParentLocalNetwork>|null  $localNetwork
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $contentCachingParentDetailsId = null,
        public ?bool $acPower = null,
        public ?int $cacheSizeBytes = null,
        public ?ComputerContentCachingParentCapabilities $capabilities = null,
        public ?bool $portable = null,
        public ?Collection $localNetwork = null,
        public array $extra = [],
    ) {}
}
