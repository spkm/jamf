<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A VolumePurchasingSubscription record from the Jamf Pro API.
 */
readonly class VolumePurchasingSubscription extends Data
{
    protected const LISTS = ['internalRecipients' => InternalRecipient::class, 'externalRecipients' => ExternalRecipient::class];

    /**
     * @param  list<string>|null  $triggers
     * @param  list<string>|null  $locationIds
     * @param  Collection<int, InternalRecipient>|null  $internalRecipients
     * @param  Collection<int, ExternalRecipient>|null  $externalRecipients
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?bool $enabled = null,
        public ?array $triggers = null,
        public ?array $locationIds = null,
        public ?Collection $internalRecipients = null,
        public ?Collection $externalRecipients = null,
        public ?string $siteId = null,
        public ?string $id = null,
        public array $extra = [],
    ) {}
}
