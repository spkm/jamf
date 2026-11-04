<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A ComputerLocalUserAccount record from the Jamf Pro API.
 */
readonly class ComputerLocalUserAccount extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $uid = null,
        public ?string $userGuid = null,
        public ?string $username = null,
        public ?string $fullName = null,
        public ?bool $admin = null,
        public ?string $homeDirectory = null,
        /** Home directory size in MB. */
        public ?int $homeDirectorySizeMb = null,
        public ?bool $fileVault2Enabled = null,
        public ?string $userAccountType = null,
        public ?int $passwordMinLength = null,
        public ?int $passwordMaxAge = null,
        public ?int $passwordMinComplexCharacters = null,
        public ?int $passwordHistoryDepth = null,
        public ?bool $passwordRequireAlphanumeric = null,
        public ?string $computerAzureActiveDirectoryId = null,
        public ?string $userAzureActiveDirectoryId = null,
        public ?string $azureActiveDirectoryId = null,
        public array $extra = [],
    ) {}
}
