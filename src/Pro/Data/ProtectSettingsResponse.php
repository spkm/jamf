<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ProtectSettingsResponse record from the Jamf Pro API.
 */
readonly class ProtectSettingsResponse extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $apiClientId = null,
        /** display name used when creating the API Client in the Jamf Protect web console */
        public ?string $apiClientName = null,
        /** ID used when making requests to identify this particular Protect registration. */
        public ?string $registrationId = null,
        public ?string $protectUrl = null,
        /** determines whether Protect Platform Plan syncing is enabled */
        public ?bool $platformPlanSync = null,
        public ?string $lastSyncTime = null,
        public ?string $syncStatus = null,
        /** determines whether the Jamf Protect agent will be automatically installed on client computers */
        public ?bool $autoInstall = null,
        public array $extra = [],
    ) {}
}
