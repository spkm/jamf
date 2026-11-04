<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A AppRequestSettings record from the Jamf Pro API.
 */
readonly class AppRequestSettings extends Data
{
    /**
     * @param  list<string>|null  $approverEmails
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $isEnabled = null,
        /** Can be any of the country codes from /v1/app-store-country-codes or "deviceLocale" to use each individual device's locale */
        public ?string $appStoreLocale = null,
        public ?int $requesterUserGroupId = null,
        public ?array $approverEmails = null,
        public array $extra = [],
    ) {}
}
