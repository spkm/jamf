<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A VolumePurchasingLocation record from the Jamf Pro API.
 */
readonly class VolumePurchasingLocation extends Data
{
    protected const LISTS = ['content' => VolumePurchasingContent::class];

    /**
     * @param  Collection<int, VolumePurchasingContent>|null  $content
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $name = null,
        public ?int $totalPurchasedLicenses = null,
        public ?int $totalUsedLicenses = null,
        public ?string $id = null,
        public ?string $appleId = null,
        public ?string $email = null,
        public ?string $organizationName = null,
        public ?string $tokenExpiration = null,
        /** The two-letter ISO 3166-1 code that designates the country where the Volume Purchasing account is located. */
        public ?string $countryCode = null,
        public ?string $locationName = null,
        /** If this is "true", the clientContext used by this server does not match the clientContext returned by the Volume Purchasing API. */
        public ?bool $clientContextMismatch = null,
        public ?bool $automaticallyPopulatePurchasedContent = null,
        public ?bool $sendNotificationWhenNoLongerAssigned = null,
        public ?bool $autoRegisterManagedUsers = null,
        public ?string $siteId = null,
        public ?string $siteName = null,
        public ?string $lastSyncTime = null,
        public ?Collection $content = null,
        public array $extra = [],
    ) {}
}
