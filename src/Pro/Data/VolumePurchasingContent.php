<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A VolumePurchasingContent record from the Jamf Pro API.
 */
readonly class VolumePurchasingContent extends Data
{
    /**
     * @param  list<string>|null  $deviceTypes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?int $licenseCountTotal = null,
        public ?int $licenseCountInUse = null,
        public ?int $licenseCountReported = null,
        public ?string $iconUrl = null,
        public ?array $deviceTypes = null,
        public ?string $contentType = null,
        public ?string $pricingParam = null,
        public ?string $adamId = null,
        public array $extra = [],
    ) {}
}
