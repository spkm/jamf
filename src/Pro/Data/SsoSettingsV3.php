<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A SsoSettingsV3 record from the Jamf Pro API.
 */
readonly class SsoSettingsV3 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $configurationType = null,
        public ?OidcSettings $oidcSettings = null,
        public ?SamlSettings $samlSettings = null,
        public ?bool $ssoForEnrollmentEnabled = null,
        public ?bool $ssoBypassAllowed = null,
        public ?bool $ssoEnabled = null,
        public ?bool $ssoForMacOsSelfServiceEnabled = null,
        public ?bool $enrollmentSsoForAccountDrivenEnrollmentEnabled = null,
        public ?EnrollmentSsoConfig $enrollmentSsoConfig = null,
        public ?bool $groupEnrollmentAccessEnabled = null,
        public ?string $groupEnrollmentAccessName = null,
        public array $extra = [],
    ) {}
}
