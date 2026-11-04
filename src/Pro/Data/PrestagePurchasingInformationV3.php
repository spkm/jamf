<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A PrestagePurchasingInformationV3 record from the Jamf Pro API.
 */
readonly class PrestagePurchasingInformationV3 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?bool $leased = null,
        public ?bool $purchased = null,
        public ?string $appleCareId = null,
        public ?string $poNumber = null,
        public ?string $vendor = null,
        public ?string $purchasePrice = null,
        public ?int $lifeExpectancy = null,
        public ?string $purchasingAccount = null,
        public ?string $purchasingContact = null,
        public ?string $leaseDate = null,
        public ?string $poDate = null,
        public ?string $warrantyDate = null,
        public ?int $versionLock = null,
        public array $extra = [],
    ) {}
}
