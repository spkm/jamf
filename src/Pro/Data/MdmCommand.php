<?php

namespace spkm\Jamf\Pro\Data;

use Carbon\CarbonImmutable;
use spkm\Jamf\Data\Data;

/**
 * A MdmCommand record from the Jamf Pro API.
 */
readonly class MdmCommand extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $uuid = null,
        public ?CarbonImmutable $dateSent = null,
        public ?CarbonImmutable $dateCompleted = null,
        public ?MdmCommandClient $client = null,
        public ?string $commandState = null,
        public ?string $commandType = null,
        public ?MdmCommandError $commandError = null,
        public ?int $profileId = null,
        public array $extra = [],
    ) {}
}
