<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A CloudResponse record from the Jamf Pro API.
 */
readonly class CloudResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $cloudInstance = null,
        public ?bool $rampInstance = null,
        /** Information whether this instance is a FedRAMP instance */
        public ?bool $fedRampInstance = null,
        public ?bool $govCloudInstance = null,
        /** Information whether this instance is managed by managed service provider */
        public ?bool $managedServiceProviderInstance = null,
        /** Information whether this instance is a High Compliance instance */
        public ?bool $highComplianceInstance = null,
        /** Information whether this instance has FIPS enabled */
        public ?bool $fipsEnabled = null,
        public array $extra = [],
    ) {}
}
