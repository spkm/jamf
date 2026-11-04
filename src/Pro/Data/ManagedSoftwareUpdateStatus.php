<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A ManagedSoftwareUpdateStatus record from the Jamf Pro API.
 */
readonly class ManagedSoftwareUpdateStatus extends Data
{
    /**
     * @param  array<string, mixed>|null  $device
     * @param  list<string>|null  $pastNotifications
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $osUpdatesStatusId = null,
        public ?array $device = null,
        public ?float $downloadPercentComplete = null,
        public ?bool $downloaded = null,
        public ?string $productKey = null,
        public ?string $status = null,
        /** not applicable to all managed software update statuses */
        public ?int $deferralsRemaining = null,
        /** not applicable to all managed software update statuses */
        public ?int $maxDeferrals = null,
        /** not applicable to all managed software update statuses */
        public ?CarbonImmutable $nextScheduledInstall = null,
        /** not applicable to all managed software update statuses */
        public ?array $pastNotifications = null,
        public ?CarbonImmutable $created = null,
        public ?CarbonImmutable $updated = null,
        public array $extra = [],
    ) {}
}
