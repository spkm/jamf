<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A PurchasingV2 record from the Jamf Pro API.
 */
readonly class PurchasingV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $purchased = null,
        public ?bool $leased = null,
        public ?string $poNumber = null,
        public ?string $vendor = null,
        public ?string $appleCareId = null,
        public ?string $purchasePrice = null,
        public ?string $purchasingAccount = null,
        public ?CarbonImmutable $poDate = null,
        public ?CarbonImmutable $warrantyExpiresDate = null,
        public ?CarbonImmutable $leaseExpiresDate = null,
        public ?int $lifeExpectancy = null,
        public ?string $purchasingContact = null,
        public array $extra = [],
    ) {}
}
