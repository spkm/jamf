<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A OnboardingItem record from the Jamf Pro API.
 */
readonly class OnboardingItem extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        /** The id of the Jamf Pro object that should be added to the onboarding workflow for end users. Use this in conjunction with the selfServiceEntityType. For example, if the policy with id 132 should be... */
        public ?string $entityId = null,
        public ?string $entityName = null,
        public ?string $scopeDescription = null,
        public ?string $siteDescription = null,
        public ?string $selfServiceEntityType = null,
        public ?int $priority = null,
        public array $extra = [],
    ) {}
}
