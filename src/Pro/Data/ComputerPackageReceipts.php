<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * All package receipts are listed by their package name
 */
readonly class ComputerPackageReceipts extends Data
{
    /**
     * @param  list<string>|null  $installedByJamfPro
     * @param  list<string>|null  $installedByInstallerSwu
     * @param  list<string>|null  $cached
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?array $installedByJamfPro = null,
        public ?array $installedByInstallerSwu = null,
        public ?array $cached = null,
        public array $extra = [],
    ) {}
}
