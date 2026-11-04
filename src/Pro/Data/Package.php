<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A Package record from the Jamf Pro API.
 */
readonly class Package extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $packageName = null,
        public ?string $fileName = null,
        public ?string $categoryId = null,
        public ?string $info = null,
        public ?string $notes = null,
        public ?int $priority = null,
        public ?string $osRequirements = null,
        public ?bool $fillUserTemplate = null,
        public ?bool $indexed = null,
        public ?bool $fillExistingUsers = null,
        public ?bool $swu = null,
        public ?bool $rebootRequired = null,
        public ?bool $selfHealNotify = null,
        public ?string $selfHealingAction = null,
        public ?bool $osInstall = null,
        public ?string $serialNumber = null,
        public ?string $parentPackageId = null,
        public ?string $basePath = null,
        public ?bool $suppressUpdates = null,
        public ?string $cloudTransferStatus = null,
        public ?bool $ignoreConflicts = null,
        public ?bool $suppressFromDock = null,
        public ?bool $suppressEula = null,
        public ?bool $suppressRegistration = null,
        public ?string $installLanguage = null,
        public ?string $md5 = null,
        public ?string $sha256 = null,
        public ?string $sha3512 = null,
        public ?string $hashType = null,
        public ?string $hashValue = null,
        public ?string $size = null,
        public ?string $osInstallerVersion = null,
        public ?string $manifest = null,
        public ?string $manifestFileName = null,
        public ?string $format = null,
        public array $extra = [],
    ) {}
}
