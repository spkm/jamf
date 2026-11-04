<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A GetEnrollmentCustomizationPanelLdapAuth record from the Jamf Pro API.
 */
readonly class GetEnrollmentCustomizationPanelLdapAuth extends Data
{
    protected const LISTS = ['ldapGroupAccess' => EnrollmentCustomizationLdapGroupAccess::class];

    /**
     * @param  Collection<int, EnrollmentCustomizationLdapGroupAccess>|null  $ldapGroupAccess
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $displayName = null,
        public ?int $rank = null,
        public ?string $usernameLabel = null,
        public ?string $passwordLabel = null,
        public ?string $title = null,
        public ?string $backButtonText = null,
        public ?string $continueButtonText = null,
        public ?Collection $ldapGroupAccess = null,
        public ?int $id = null,
        public ?string $type = null,
        public array $extra = [],
    ) {}
}
