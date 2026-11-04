<?php

namespace spkm\Jamf\Pro\Data;

use spkm\Jamf\Data\Data;

/**
 * A MdmCommandClient record from the Jamf Pro API.
 */
readonly class MdmCommandClient extends Data
{
    /**
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?string $managementId = null,
        public ?string $clientType = null,
        public array $extra = [],
    ) {}
}
