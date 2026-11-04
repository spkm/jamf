<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerPurchase record from the Jamf Pro API.
 */
readonly class ComputerPurchase extends Data
{
    protected const LISTS = ['extensionAttributes' => ComputerExtensionAttribute::class];

    /**
     * @param  Collection<int, ComputerExtensionAttribute>|null  $extensionAttributes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $leased = null,
        public ?bool $purchased = null,
        public ?string $poNumber = null,
        public ?string $poDate = null,
        public ?string $vendor = null,
        public ?string $warrantyDate = null,
        public ?string $appleCareId = null,
        public ?string $leaseDate = null,
        public ?string $purchasePrice = null,
        public ?int $lifeExpectancy = null,
        public ?string $purchasingAccount = null,
        public ?string $purchasingContact = null,
        public ?Collection $extensionAttributes = null,
        public array $extra = [],
    ) {}
}
