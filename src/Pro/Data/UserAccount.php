<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A UserAccount record from the Jamf Pro API.
 */
readonly class UserAccount extends Data
{
    protected const HIDDEN = ['plainPassword'];

    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $id = null,
        public ?string $plainPassword = null,
        public ?string $username = null,
        public ?string $realname = null,
        public ?string $email = null,
        public ?string $phone = null,
        public ?int $ldapServerId = null,
        public ?string $distinguishedName = null,
        /** Site the account is scoped to, or -1 for no site. Omitting this field on an update applies the default of -1 and therefore clears any site already set, so send the current value to keep it. Changing... */
        public ?int $siteId = null,
        /** Access level for the account. Omitting this field applies the default of FullAccess, which the requesting account may only grant if it has full access itself. */
        public ?string $accessLevel = null,
        /** Privilege level for the account. Omitting this field applies the default of ADMINISTRATOR; ADMINISTRATOR, AUDITOR and ENROLLMENT expand to fixed privilege sets and may only be granted by an... */
        public ?string $privilegeLevel = null,
        public ?CarbonImmutable $lastPasswordChange = null,
        public ?bool $changePasswordOnNextLogin = null,
        public ?int $failedLoginAttempts = null,
        /** Status of the account */
        public ?string $accountStatus = null,
        /** Type of the account */
        public ?string $accountType = null,
        public array $extra = [],
    ) {}
}
