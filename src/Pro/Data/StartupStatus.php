<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A StartupStatus record from the Jamf Pro API.
 */
readonly class StartupStatus extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $step = null,
        public ?string $stepCode = null,
        public ?string $stepParam = null,
        public ?int $percentage = null,
        public ?string $warning = null,
        public ?string $warningCode = null,
        public ?string $warningParam = null,
        public ?string $error = null,
        public ?string $errorCode = null,
        public ?bool $setupAssistantNecessary = null,
        public array $extra = [],
    ) {}
}
