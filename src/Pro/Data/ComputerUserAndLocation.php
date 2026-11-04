<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A ComputerUserAndLocation record from the Jamf Pro API.
 */
readonly class ComputerUserAndLocation extends Data
{
    protected const LISTS = ['extensionAttributes' => ComputerExtensionAttribute::class];

    /**
     * @param  Collection<int, ComputerExtensionAttribute>|null  $extensionAttributes
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $username = null,
        public ?string $realname = null,
        public ?string $email = null,
        public ?string $position = null,
        public ?string $phone = null,
        public ?string $departmentId = null,
        public ?string $buildingId = null,
        public ?string $room = null,
        public ?Collection $extensionAttributes = null,
        public array $extra = [],
    ) {}
}
