<?php

namespace spkm\Jamf\Pro\Data;

use Illuminate\Support\Collection;
use spkm\Jamf\Data\Data;

/**
 * A DssDeclarations record from the Jamf Pro API.
 */
readonly class DssDeclarations extends Data
{
    protected const LISTS = ['declarations' => DssDeclaration::class];

    /**
     * @param  Collection<int, DssDeclaration>|null  $declarations
     * @param  array<string, mixed>  $extra  Fields Jamf sent that the model has no property for.
     */
    public function __construct(
        public ?Collection $declarations = null,
        public array $extra = [],
    ) {}
}
