<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerMdmCapability record from the Jamf Pro API.
 */
readonly class ComputerMdmCapability extends Data
{
    protected const LISTS = ['userManagementInfo' => ComputerUserManagementInfo::class];

    /**
     * @param  list<string>|null  $capableUsers
     * @param  Collection<int, ComputerUserManagementInfo>|null  $userManagementInfo
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?bool $capable = null,
        /** Deprecated. Use userManagementInfo instead. */
        public ?array $capableUsers = null,
        public ?Collection $userManagementInfo = null,
        public array $extra = [],
    ) {}
}
