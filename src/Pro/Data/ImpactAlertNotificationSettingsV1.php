<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ImpactAlertNotificationSettingsV1 record from the Jamf Pro API.
 */
readonly class ImpactAlertNotificationSettingsV1 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $scopeableObjectsAlertEnabled = null,
        public ?bool $scopeableObjectsConfirmationCodeEnabled = null,
        public ?bool $deployableObjectsAlertEnabled = null,
        public ?bool $deployableObjectsConfirmationCodeEnabled = null,
        public array $extra = [],
    ) {}
}
