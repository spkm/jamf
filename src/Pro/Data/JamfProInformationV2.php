<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A JamfProInformationV2 record from the Jamf Pro API.
 */
readonly class JamfProInformationV2 extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $vppTokenEnabled = null,
        public ?bool $depAccountEnabled = null,
        /** **Deprecated as of 11.25.** This field always returns false. */
        public ?bool $byodEnabled = null,
        public ?bool $userMigrationEnabled = null,
        public ?bool $cloudDeploymentsEnabled = null,
        public ?bool $patchEnabled = null,
        public ?bool $ssoSamlEnabled = null,
        public ?bool $smtpEnabled = null,
        public array $extra = [],
    ) {}
}
