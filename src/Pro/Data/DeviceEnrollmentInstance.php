<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A DeviceEnrollmentInstance record from the Jamf Pro API.
 */
readonly class DeviceEnrollmentInstance extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $supervisionIdentityId = null,
        public ?string $siteId = null,
        public ?string $serverName = null,
        public ?string $serverUuid = null,
        public ?string $adminId = null,
        public ?string $orgName = null,
        public ?string $orgEmail = null,
        public ?string $orgPhone = null,
        public ?string $orgAddress = null,
        public ?string $tokenExpirationDate = null,
        public array $extra = [],
    ) {}
}
