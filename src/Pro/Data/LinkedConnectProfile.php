<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A LinkedConnectProfile record from the Jamf Pro API.
 */
readonly class LinkedConnectProfile extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $uuid = null,
        public ?string $profileId = null,
        public ?string $profileName = null,
        public ?string $profileScopeDescription = null,
        /** Must be a valid Jamf Connect version 2.3.0 or higher. Versions are listed here `https://www.jamf.com/resources/product-documentation/jamf-connect-administrators-guide/` */
        public ?string $version = null,
        /** Determines how the server will behave regarding application updates and installs on the devices that have the configuration profile installed. * `PATCH_UPDATES` - Server handles initial installation... */
        public ?string $autoDeploymentType = null,
        public array $extra = [],
    ) {}
}
