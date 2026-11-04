<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A InventoryPreloadRecordV2 record from the Jamf Pro API.
 */
readonly class InventoryPreloadRecordV2 extends Data
{
    protected const LISTS = ['extensionAttributes' => InventoryPreloadExtensionAttribute::class];

    /**
     * @param  Collection<int, InventoryPreloadExtensionAttribute>|null  $extensionAttributes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $serialNumber = null,
        public ?string $deviceType = null,
        public ?string $username = null,
        public ?string $fullName = null,
        public ?string $emailAddress = null,
        public ?string $phoneNumber = null,
        public ?string $position = null,
        public ?string $department = null,
        public ?string $building = null,
        public ?string $room = null,
        public ?string $poNumber = null,
        public ?string $poDate = null,
        public ?string $warrantyExpiration = null,
        public ?string $appleCareId = null,
        public ?string $lifeExpectancy = null,
        public ?string $purchasePrice = null,
        public ?string $purchasingContact = null,
        public ?string $purchasingAccount = null,
        public ?string $leaseExpiration = null,
        public ?string $barCode1 = null,
        public ?string $barCode2 = null,
        public ?string $assetTag = null,
        public ?string $vendor = null,
        public ?Collection $extensionAttributes = null,
        public array $extra = [],
    ) {}
}
