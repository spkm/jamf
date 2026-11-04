<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A PatchSoftwareTitleConfiguration record from the Jamf Pro API.
 */
readonly class PatchSoftwareTitleConfiguration extends Data
{
    protected const LISTS = ['extensionAttributes' => PatchSoftwareTitleConfigurationExtensionAttributes::class, 'packages' => PatchSoftwareTitlePackages::class];

    /**
     * @param  Collection<int, PatchSoftwareTitleConfigurationExtensionAttributes>|null  $extensionAttributes
     * @param  Collection<int, PatchSoftwareTitlePackages>|null  $packages
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $displayName = null,
        public ?string $categoryId = null,
        public ?string $siteId = null,
        public ?bool $uiNotifications = null,
        public ?bool $emailNotifications = null,
        public ?string $softwareTitleId = null,
        public ?bool $jamfOfficial = null,
        public ?Collection $extensionAttributes = null,
        public ?string $softwareTitleName = null,
        public ?string $softwareTitleNameId = null,
        public ?string $softwareTitlePublisher = null,
        public ?string $patchSourceName = null,
        public ?bool $patchSourceEnabled = null,
        public ?string $id = null,
        public ?Collection $packages = null,
        public array $extra = [],
    ) {}
}
